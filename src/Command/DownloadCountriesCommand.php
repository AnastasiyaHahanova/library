<?php

namespace App\Command;

use App\Entity\Country;
use Doctrine\Persistence\ObjectManager;
use Psr\Log\LoggerInterface;
use App\Repository\CountryRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class DownloadCountriesCommand extends Command
{
    /** @var CountryRepository */
    private $countryRepository;

    private $logger;

    private $manager;

    public function __construct(
        CountryRepository $countryRepository,
        LoggerInterface $logger,
        ObjectManager $manager
    )
    {
        $this->countryRepository = $countryRepository;
        $this->logger            = $logger;
        $this->manager           = $manager;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('app:load:countries')
            ->addOption('uploadDir', null, InputOption::VALUE_REQUIRED)
            ->addOption('fileName', null, InputOption::VALUE_REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $inputDirectory = $input->getOption('uploadDir');
        $fileName       = $input->getOption('fileName');
        $success        = true;
        if (!is_dir($inputDirectory)) {
            $this->logger->error(
                'Invalid option "uploadDir" value. Directory does not exists',
                ['uploadDir' => $inputDirectory]
            );
            exit(1);
        }
        $filePath = sprintf('%s/%s', rtrim($inputDirectory, '/'), $fileName);

        $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
        if ($fileExtension !== 'json') {
            $this->logger->info('Skip file. File has wrong extension', ['filePath' => $filePath]);
            $success = false;
        }

        if (!is_file($filePath)) {
            $this->logger->error('Skip file. File does not exist', ['filePath' => $filePath]);
            $success = false;
        }

        if (!is_readable($filePath)) {
            $this->logger->error('Skip file. File does not readable', ['filePath' => $filePath]);
            $success = false;
        }
        if (!$success) {
            $this->logger->error(
                'Invalid option "uploadDir" or "fileName" value. File does not exists',
                ['uploadDir' => $inputDirectory]
            );
            exit(1);
        }
        $file      = file_get_contents($filePath);
        $countries = json_decode($file, true);
        if (!is_array($countries)) {
            $this->logger->error(
                'Invalid format of json file'
            );
            exit(1);
        }

        foreach ($countries as $item) {
            $country = new Country();
            $country->setName($item['name']);
            $country->setContinent($item['region']);
            $country->setIso($item['alpha-2']);
            $this->manager->persist($country);
        }

        $this->manager->flush();
        $output->writeln('Countries are loaded!');
    }

}
