<?php

namespace App\Controller;

use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    /**
     * @Route("/tasks", name="task_list")
     * @param  TaskRepository $repository
     * @return \Symfony\Component\HttpFoundation\Response
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Psr\Cache\InvalidArgumentException
     */
    public function listAction(TaskRepository $repository)
    {
        $cache = new FilesystemAdapter();

        $tasksCache = $cache->getItem('tasksList');

        if (!$tasksCache->isHit()) {

            $tasksList = $repository->findUndoneTasks();
            $tasksCache->set($tasksList);
            $cache->save($tasksCache);
        }

        return $this->render(
            'task/list.html.twig', [
            'tasks' => $tasksCache->get(),
            ]
        );
    }
}
