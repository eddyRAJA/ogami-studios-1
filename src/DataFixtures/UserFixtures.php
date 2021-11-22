<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Faker;


class UserFixtures extends Fixture implements DependentFixtureInterface
{
    private $passwordHasher;
    //private $passwordEncoder;
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
        //$this->passwordEncoder =$passwordEncoder;
    }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        // Création d’un utilisateur de type “administrateur”
        $faker = Faker\Factory::create('fr_FR');
       

        $admin = new User();
        $admin->setFirstname($faker->firstName())
            ->setLastname($faker->lastName())
            ->setEmail('admin@monsite.com')
            ->setAdress($faker->address())
            ->setCity($faker->colorName())
            ->setState($faker->colorName())
            ->setPhoneNumber($faker->numerify())
            ->setJobName($faker->jobTitle())
            ->setCompagny($this->getReference('compagny_'. $faker->numberBetween(0,4)))
            //->setCreatedAt($faker->datetime())
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword($this->passwordHasher->hashPassword(
                $admin,
                'adminpassword'
            ));

        $manager->persist($admin);

        // Création d’un utilisateur de type “contributeur” (= auteur)
        for ($i=0; $i < 10; $i++) { 

        $customer = new User();
        $customer->setFirstname($faker->firstName())
            ->setLastname($faker->lastName())
            ->setEmail($faker->email())
            ->setAdress($faker->address())
            ->setCity($faker->city())
            ->setState($faker->country())
            ->setPhoneNumber($faker->numerify())
            ->setJobName($faker->jobTitle())
            ->setCompagny($this->getReference('compagny_' . $faker->numberBetween(0,4)) )
            //->setCreatedAt($faker->datetime())
            ->setRoles(['ROLE_CUSTOMER'])
            
            ->setPassword($this->passwordHasher->hashPassword(
                $customer,
                'customerpassword'
            ));


        $manager->persist($customer);
        }    

        // Sauvegarde des 2 nouveaux utilisateurs :
        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
            CompagnyFixtures::class
        ];
    }
}
