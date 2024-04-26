<?php

namespace App\DataFixtures;

use App\Entity\Document;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $document = new Document('Hello translations 🇬🇧');
        $document->getText()->setTranslation('Hallo Übersetzungen 🇩🇪', 'de_DE');
        $manager->persist($document);

        $manager->flush();
    }
}
