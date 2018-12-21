<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 22/12/2018
 * Time: 00:25
 */

namespace App\Controller;
use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


class TaskDetailsController extends AbstractController
{
    /**
     * @Route("/task/{id}", name="task_details")
     * @IsGranted("ROLE_USER")
     * @param TaskRepository $repository
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function TasksDetails(TaskRepository $repository, $id)
    {
        $task = $repository->find($id);

        return $this->render(
            'task/details.html.twig', [
                'task' => $task ,
            ]
        );
    }
}