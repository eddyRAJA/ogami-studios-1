<?php

namespace App\DataFixtures;

use App\Entity\Illustration;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;

class IllustrationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        $faker = Faker\Factory::create('fr_FR');

        $faker->addProvider(new \Xvladqt\Faker\LoremFlickrProvider($faker));
        // $product = new Product();
        for ($i = 0; $i < 19; $i++) {
            # code...
            $illustration = new Illustration();
            $illustration->setName($faker->company())
                ->setUrl($faker->imageUrl(680, 400, ['cinema']))
                ->setDecription($faker->sentence(rand(5, 10)));
            for ($j = 0; $j < count(GalleryFixtures::GALERIES_CATEGORIES); $j++) {
                # code...
                $illustration->setGallery($this->getReference('gallery_' . $j,  rand(0, count(GalleryFixtures::GALERIES_CATEGORIES) - 1), $illustration));
            }
            $manager->persist($illustration);
            $this->addReference('illustration_' . $i, $illustration);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
            GalleryFixtures::class,
        ];
    }
}
