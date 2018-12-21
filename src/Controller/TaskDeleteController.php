<?php

namespace App\Controller;

use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Routing\Annotation\Route;

class TaskDeleteController extends AbstractController
{
    /**
     * @Route("/tasks/{id}/delete", name="task_delete")
     * @param                       Task                   $task
     * @param                       EntityManagerInterface $entityManager
     * @return                      \Symfony\Component\HttpFoundation\RedirectResponse
     * @return \Symfony\Component\HttpFoundation\Response
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Psr\Cache\InvalidArgumentException
     */
    public function deleteTaskAction(Task $task, EntityManagerInterface $entityManager)
    {
        if ($task->getUser() === $this->getUser()) {
            $entityManager->remove($task);
            $entityManager->flush();
            $cache = new FilesystemAdapter();
            $cache->delete('tasksList');
            $cache->delete('tasksDoneList');
            $this->addFlash('success', 'La tâche a bien été supprimée.');

        } elseif ($task->getUser()->getUsername() === 'Anonyme' && $this->isGranted('ROLE_ADMIN')) {
            $entityManager->remove($task);
            $entityManager->flush();
            $cache = new FilesystemAdapter();
            $cache->delete('tasksList');
            $cache->delete('tasksDoneList');
            $this->addFlash('success', 'La tâche a bien été supprimée.');

        } else {
            $this->addFlash('error', 'Vous ne pouvez pas supprimer cette tâche.');
        }

        return $this->redirectToRoute('homepage');
    }
}
