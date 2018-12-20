<?php

namespace App\Controller;

use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    /**
     * @Route("/tasks", name="task_list")
     * @param           TaskRepository $repository
     * @return          \Symfony\Component\HttpFoundation\Response
     */
    public function listAction(TaskRepository $repository)
    {
        $tasks = $repository->findUndoneTasks();

        return $this->render(
            'task/list.html.twig', [
            'tasks' => $tasks,
            ]
        );
    }
}
