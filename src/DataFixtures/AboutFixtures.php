<?php

namespace App\DataFixtures;

use App\Entity\About;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AboutFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        $faker->addProvider(new \Xvladqt\Faker\LoremFlickrProvider($faker));
        // $product = new Product();
        $about = new About();
        $about->setAvatar($faker->imageUrl(680, 400, ['landscape']))
        ->setDescription($faker->sentence(rand(5, 10)))
        ->setTitle($faker->word(rand(3, 6)))
        ->setSlogan($faker->sentence(rand(6, 15)))
        ->setFacebook($faker->url())
        ->setInstagram($faker->url())
        ->setLinkedin($faker->url())
        ->setTwitter($faker->url());
        
        $manager->persist($about);
        $manager->flush();
    }
}
