<?php

namespace App\DataFixtures;
use DateTime;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;

class UserFixtures extends Fixture
{
    public function __construct()
    {
    }

    public function load(\Doctrine\Persistence\ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('Naztasiya');
        $user->setSecondName('Хаханова');
        $user->setFirstName('Анастасия');
        $user->setPatronymic('Дмитриевна');
        $data =new DateTime();
        $user->setBirthDate($data->setDate(1996,9,12));
        $user->setEmail('anastasiya.hahanova@mail.ru');
        $user->setPassword('qwerty123');
        $manager->persist($user);
        $manager->flush();
    }
}
