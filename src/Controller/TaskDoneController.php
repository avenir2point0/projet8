<?php

namespace App\Controller;

use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TaskDoneController extends AbstractController
{
    /**
     * @Route("/tasks/done", name="task_done_list")
     * @param TaskRepository $repository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction(TaskRepository $repository)
    {
        $tasks = $repository->findDoneTasks();

        return $this->render('task/list.html.twig', [
            'tasks' => $tasks,
        ]);
    }
}
