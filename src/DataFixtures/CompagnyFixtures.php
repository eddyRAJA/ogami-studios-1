<?php

namespace App\DataFixtures;

use App\Entity\Compagny;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;

use Doctrine\Persistence\ObjectManager;
use Faker;

class CompagnyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();
        
        for ($i=0; $i < 5; $i++) { 
            $compagny = new Compagny();
            $compagny ->setName($faker->company())
                ->setEmail($faker->companyEmail)
                ->setAdress($faker->address())
                ->setCity($faker->city())
                ->setState($faker->country())
                ->setPhoneNumber($faker->numerify())
                ->setFaxNumber($faker->numerify());

                

                $manager->persist($compagny);
                $this->addReference('compagny_' . $i, $compagny);
            }
               
            # code...
            # $compagny->getUsers($this->getReference('user_' . $userId, $compagny));

                $manager-> flush();
        
    }

   
}
