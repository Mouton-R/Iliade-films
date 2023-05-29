<?php

namespace App\DataFixtures;

use App\Entity\Films;
use Faker;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;


class FilmsFixtures extends Fixture
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
                ->setréalisation($faker->year())
                ->setscénario($faker->word(1))
                ->setannée($faker->year())
                ->setdurée($faker->numberBetween(10, 160))
                ->setSynopsis($faker->paragraph(5))
                ->setCoproduction($faker->word(5))
                ->setSoutiens($faker->word(3))
                ->setDistribution($faker->word(3))
                ->setDiffusion($faker->word(2))
                ->setSélections($faker->word(1))
                ->setAvec($faker->word(1))
                ->setImage($faker->word(4))
                ->setSon($faker->word(5))
                ->setMontage($faker->word(3))
                ->setMusique($faker->year())
                ->setDirection($faker->word(1))
                ->setRégie($faker->word(1))
                ->setDécors($faker->word(1))
                ->setCostumes($faker->word(1))
                ->setEtalonnage($faker->word(5))
                ->setSlug($this->slugger->slug($film->getTitre()));


            $category = $this->getReference('cat-' . rand(1, 2));
            $film->setCategories($category);
            $this->setReference('fil-' . $fil, $film);

            $manager->persist($film);

            $manager->flush();
        }
    }
}
