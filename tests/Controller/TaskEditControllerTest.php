<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 17/12/2018
 * Time: 04:56
 */

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TaskEditControllerTest extends WebTestCase
{
    public function testTaskEditPage()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/tasks/3/edit');

        $form = $crawler->selectButton('Modifier')->form();
        $form['task[title]'] = 'Titre modifié';
        $form['task[content]'] = 'Contenu modifié pour test';

        $crawler = $client->submit($form);
        $crawler = $client->followRedirect();
        $this->assertEquals(1, $crawler->filter('html:contains("La tâche")')->count());
    }
}
