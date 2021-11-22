<?php

namespace App\DataFixtures;

use App\Entity\Studio;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class StudioFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        $faker->addProvider(new \Xvladqt\Faker\LoremFlickrProvider($faker));

        for ($i=0; $i < 4; $i++) { 
            # code...
            $studio = new Studio();
            $studio->setName($faker->company())
            ->setImageFront($faker->imageUrl(680, 400, ['room']))
            ->setImageInside($faker->imageUrl(680, 400, ['room']))
            ->setImageBack($faker->imageUrl(680, 400, ['room']))
            ->setDescription($faker->sentence(rand(5, 10)));

            $manager->persist($studio);
        }

        $manager->flush();
    }
}
