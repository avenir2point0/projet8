<?php

namespace App\Controller;

use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    /**
     * @Route("/tasks", name="task_list")
     */
    public function listAction()
    {
        return $this->render('task/list.html.twig', ['tasks' => $this->getDoctrine()->getRepository('App:Task')->findAll()]);
    }
}
