<?php

namespace App\Controller;

use App\Repository\TaskRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Routing\Annotation\Route;

class TaskDoneController extends AbstractController
{
    /**
     * @Route("/tasks/done", name="task_done_list")
     * @IsGranted("ROLE_USER")
     * @param   TaskRepository $repository
     * @return  \Symfony\Component\HttpFoundation\Response
     * @return \Symfony\Component\HttpFoundation\Response
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Psr\Cache\InvalidArgumentException
     */
    public function listAction(TaskRepository $repository)
    {
        $cache = new FilesystemAdapter();

        $tasksCache = $cache->getItem('tasksDoneList');

        if (!$tasksCache->isHit()) {

            $tasksDoneList = $repository->findDoneTasks();
            $tasksCache->set($tasksDoneList);
            $cache->save($tasksCache);
        }

        return $this->render(
            'task/list.html.twig', [
            'tasks' => $tasksCache->get(),
            ]
        );
    }
}
