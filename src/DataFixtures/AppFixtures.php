<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Maison;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $facker = Factory::create();
        for ($i = 1; $i <= 10; $i++) {

            $maison = new Maison;
            $maison->setTitle('Maison de ' . $facker->name())
                ->setDescription($facker->text(255))
                ->setSurface($facker->numberBetween(49, 199))
                ->setRooms($facker->numberBetween(5, 15))
                ->setBedrooms($facker->numberBetween(1, 5))
                ->setPrice($facker->numberBetween(75000, 580000))
                ->setImg1('maison.png');

            $manager->persist($maison);
        }


        $manager->flush();
    }
}
