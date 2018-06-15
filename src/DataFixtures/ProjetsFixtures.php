<?php

namespace App\DataFixtures;

use App\Entity\Projets;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ProjetsFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $i = 1;

        //Set test values in the table "Team" for 4 teams
        while ($i <= 10) {
            $projets = new Projets();
            $projets->setname("Projet n°" . $i);
            $projets->setEntreprise($i . "entreprise");
            $projets->setOrientation($i);
            $projets->setDescription($i . "lorem lesFJHESDKFBFQDKEJdsjkdsjdejhfkdhdjbkfjdodsdkjsdkdsncnddqsjerhed");
            $projets->setBudget($i);
            $projets->setLargeur($i);
            $projets->setProfondeur($i);
            $projets->setHauteur($i);

            $manager->persist($projets);
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