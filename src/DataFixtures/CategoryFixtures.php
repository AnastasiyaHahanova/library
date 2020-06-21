<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategoryFixtures extends Fixture
{
    public function load(\Doctrine\Persistence\ObjectManager $manager)
    {
        $category =  new Category();
        $category->setName('Классическая литература');
        $manager->persist($category);

        $category =  new Category();
        $category->setName('Детская литература');
        $manager->persist($category);

        $category =  new Category();
        $category->setName('Детективы');
        $manager->persist($category);

        $category =  new Category();
        $category->setName('Фэнтези');
        $manager->persist($category);

        $category =  new Category();
        $category->setName('Фантастика');
        $manager->persist($category);

        $category =  new Category();
        $category->setName('Публицистическая литература');
        $manager->persist($category);

        $category =  new Category();
        $category->setName('Любовные романы');
        $manager->persist($category);

        $category =  new Category();
        $category->setName('Боевики');
        $manager->persist($category);

        $category =  new Category();
        $category->setName('Ужасы');
        $manager->persist($category);

        $manager->flush();
    }
}
