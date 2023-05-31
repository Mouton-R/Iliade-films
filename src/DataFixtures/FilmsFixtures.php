<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Films;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class FilmsFixtures extends Fixture implements DependentFixtureInterface
{

    public function __construct(private SluggerInterface $slugger)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');



        for ($fil = 0; $fil < 25; $fil++) {
            $film = new Films();
            $film->setTitre($faker->word(3))
                ->setrealisation($faker->year())
                ->setscenario($faker->word(1))
                ->setannee($faker->year())
                ->setduree($faker->numberBetween(10, 160))
                ->setSynopsis($faker->paragraph(5))
                ->setCoproduction($faker->word(5))
                ->setSoutiens($faker->word(3))
                ->setDistribution($faker->word(3))
                ->setDiffusion($faker->word(2))
                ->setSelections($faker->word(1))
                ->setAvec($faker->word(1))
                ->setImage($faker->word(4))
                ->setSon($faker->word(5))
                ->setMontage($faker->word(3))
                ->setMusique($faker->year())
                ->setDirection($faker->word(1))
                ->setRegie($faker->word(1))
                ->setDecors($faker->word(1))
                ->setCostumes($faker->word(1))
                ->setEtalonnage($faker->word(5))
                ->setSlug($this->slugger->slug($film->getTitre()));


            $format = $this->getReference('for-' . rand(1, 2));
            $film->setFormats($format);
            $this->setReference('fil-' . $fil, $film);

            $manager->persist($film);

            $manager->flush();
        }
    }

    public function getDependencies(): array
    {
        return [
            FormatsFixtures::class
        ];
    }
}
