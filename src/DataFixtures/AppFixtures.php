<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(\Doctrine\Persistence\ObjectManager $manager)
    {
        $book = new Book();
        $book->setYear(1964);
        $book->setName("Праздник, который всегда с тобой");
        $book->setAuthor("Э.Хэмингуэй");
        $manager->persist($book);

        $book = new Book();
        $book->setYear(1868);
        $book->setName("Идиот");
        $book->setAuthor("Ф.М. Достоевский");
        $manager->persist($book);

        $book = new Book();
        $book->setYear(1878);
        $book->setName("Анна Каренина");
        $book->setAuthor("Л.Н. Толстой");
        $manager->persist($book);

        $book = new Book();
        $book->setYear(1973);
        $book->setName("В краю лесов");
        $book->setAuthor("Т.Харди");
        $manager->persist($book);

        $book = new Book();
        $book->setYear(1847);
        $book->setName("Джейн Эйр");
        $book->setAuthor("Ш.Бронте");
        $manager->persist($book);

        $book = new Book();
        $book->setYear(1847);
        $book->setName("Грозовой перевал");
        $book->setAuthor("Э.Бронте");
        $manager->persist($book);

        $book = new Book();
        $book->setYear(1948);
        $book->setName("Исповедь");
        $book->setAuthor("Жан Жак Руссо");
        $manager->persist($book);

        $book = new Book();
        $book->setYear(1967);
        $book->setName("Сто лет одиночества");
        $book->setAuthor("Габриэль Гарсиа Маркес");
        $manager->persist($book);

        $manager->flush();
    }
}
