<?php

namespace App\DataFixtures;


use Faker;

use Faker\Factory;
use App\Entity\Formats;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;

class FormatsFixtures extends Fixture
{

    private $counter = 1;

    public function __construct(private SluggerInterface $slugger)
    {
    }


    public function load(ObjectManager $manager): void
    {
        $this->createFormat('Long-métrages', $manager);
        $this->createFormat('Court-métrages', $manager);


        $manager->flush();
    }



    public function createFormat(string $name, ObjectManager $manager)
    {

        $format = new Formats();
        $format->setName($name)
            ->setFormatOrder(1)
            ->setSlug($this->slugger->slug($format->getName()));
        $manager->persist($format);

        $this->addReference('for-' . $this->counter, $format);
        $this->counter++;

        return $format;
    }
}
