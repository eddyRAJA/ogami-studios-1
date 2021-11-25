<?php

namespace App\DataFixtures;

use App\Entity\Illustration;
use App\Entity\Studio;
use App\Repository\IllustrationRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;

class StudioFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        $faker->addProvider(new \Xvladqt\Faker\LoremFlickrProvider($faker));

        for ($i=0; $i < 4; $i++) { 
            # code...
            $studio = new Studio();
            $studio->setName($faker->company());
            for ($j=0; $j <rand(3, 10); $j++) {
                # code...
  
                //$studio->setPicture($this->getReference('illustration_'.$j));
            }
            //->setImageInside($faker->imageUrl(680, 400, ['room']))
            //$studio->setImageBack($faker->imageUrl(680, 400, ['room']))
            $studio->setDescription($faker->sentence(rand(5, 10)));

            $manager->persist($studio);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
            IllustrationFixtures::class,
        ];
    }
}
