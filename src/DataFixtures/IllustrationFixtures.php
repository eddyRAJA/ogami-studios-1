<?php

namespace App\DataFixtures;

use App\Entity\Illustration;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class IllustrationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
 
        $faker = Faker\Factory::create('fr_FR');

        $faker->addProvider(new \Xvladqt\Faker\LoremFlickrProvider($faker));
        // $product = new Product();
        for ($i=0; $i < 19; $i++) { 
            # code...
            $illustration = new Illustration();
            $illustration->setName($faker->company())
                ->setUrl($faker->imageUrl(680, 400, ['cinema']))
                ->setCreatedAt( \DateTimeImmutable::createFromMutable($faker->datetime()))
                ->setUpdatedAt(\DateTimeImmutable::createFromMutable($faker->datetime())) ;
           
            $manager->persist($illustration);
        }

        $manager->flush();
    }
}
