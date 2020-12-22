<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Prop;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i <100; $i++){
            $createAt = $faker->dateTimeBetween('-6 months','-4 months');
            $prop = new Prop();
            $prop
                ->setTitle($faker->words(3, true))
                ->setDescription($faker->sentences(3, true))
                ->setSurface($faker->numberBetween(20, 350))
                ->setRooms(mt_rand(1,5))
                ->setBedrooms($faker->numberBetween(1,9))
                ->setFloor($faker->numberBetween(0,15))
                ->setPrice (mt_rand(100000,1000000))
                ->setCity($faker->city)
                ->setAddress($faker->address)
                ->setPostalCode($faker->postcode)
                ->setSold(false)
                ->setCreatedAt($createAt);
                
            $manager->persist($prop);
            
            }
            
        {
            // $product = new Product();
            // $manager->persist($product);

            $manager->flush();
        }
 }}