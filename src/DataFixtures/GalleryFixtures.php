<?php

namespace App\DataFixtures;

use App\Entity\Gallery;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class GalleryFixtures extends Fixture
{
    const GALERIES_CATEGORIES = [
        'Studio A',
        'Studio B',
        'Studio Roof-Top',
        'Studio Kitchen',
        'Equipment_lighting',
        'Equipment_electrical',
        'Equipment_grippe',
        'Equipment_4',
        'Equipment_5',
        'Equipment_6',
        'Equipment_7',
        'About',
        'Team',
        'Community',
    ];
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        $faker->addProvider(new \Xvladqt\Faker\LoremFlickrProvider($faker));
        foreach (self::GALERIES_CATEGORIES as $key => $galleryName) {
            # code...
            $gallery = new Gallery();
            $gallery->setTitle($galleryName)
                ->setDescription($faker->sentence(rand(5, 10)));

            $manager->persist($gallery);
            $this->addReference('gallery_' . $key, $gallery);
        }

        $manager->flush();
    }
}
