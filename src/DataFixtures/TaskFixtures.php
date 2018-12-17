<?php

namespace App\DataFixtures;

use App\Entity\Task;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class TaskFixtures extends AbstractFixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $task = new Task();
        $task->setContent('Testanonyme');
        $task->setTitle('TestTitle');
        $task->setIsDone('1');
        $task->setUser($this->getReference('anonyme'));
        $manager->persist($task);

        $task1 = new Task();
        $task1->setContent('Testuser');
        $task1->setTitle('TestTitle');
        $task1->setIsDone('1');
        $task1->setUser($this->getReference('user'));
        $manager->persist($task1);

        $task = new Task();
        $task->setContent('Testadmin');
        $task->setTitle('TestTitle');
        $task->setIsDone('0');
        $task->setUser($this->getReference('admin'));
        $manager->persist($task);

        $task = new Task();
        $task->setContent('Testadmin2');
        $task->setTitle('TestTitle');
        $task->setIsDone('0');
        $task->setUser($this->getReference('admin'));
        $manager->persist($task);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            UserFixtures::class
        );
    }
}
