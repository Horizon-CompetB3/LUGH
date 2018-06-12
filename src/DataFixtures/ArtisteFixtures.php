<?php

namespace App\DataFixtures;

use App\Entity\Artiste;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ArtisteFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $i = 1;

        //Set test values in the table "Team" for 4 teams
        while ($i <= 10) {
            $artiste = new Artiste();
            $artiste->setName("Artiste n°" . $i);
            $artiste->setemail($i . "@gmail.com");
            $artiste->setPassword($i);
            $artiste->setAdresse($i);

            $manager->persist($artiste);
            $i++;
        }
        $manager->flush();
    }

    //Get the order of this fixture
    public function getOrder()
    {
        return 2;
    }
}