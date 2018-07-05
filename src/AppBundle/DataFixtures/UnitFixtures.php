<?php
/**
 * Created by PhpStorm.
 * User: dupouy
 * Date: 04/07/18
 * Time: 16:05
 */

namespace AppBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Condominium;
use Faker\Factory;

class UnitFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for ($i = 0; $i < 199; $i++) {
            $unit = new Condominium();
            $unit->setNumber($faker->numberBetween($min = 1, $max = 200));
            $unit->setFloor($faker->numberBetween($min = 0, $max = 10));
            $unit->setLastName($faker->lastName);
            $unit->setFirstName($faker->firstName);
            $unit->setPhone($faker->phoneNumber);
            $unit->setEmail($faker->freeEmail);
            $unit->setComment($faker->text);

            $manager->persist($unit);

            $this->addReference('unit' . $i, $unit);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return UnitFixtures::class;
    }
}
