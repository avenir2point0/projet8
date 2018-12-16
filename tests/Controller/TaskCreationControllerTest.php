<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 17/12/2018
 * Time: 02:28
 */

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TaskCreationControllerTest extends WebTestCase
{
    public function testTaskCreationPage()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/tasks/create', array(), array(), array(
            'PHP_AUTH_USER' => 'admin@admin.fr',
            'PHP_AUTH_PW'   => 'admin',
        ));

        $form = $crawler->filter('button[type="submit"]')->form();
        $form['task[title]'] = 'testTitre';
        $form['task[content]'] = 'testContenu';

        $crawler = $client->submit($form);
        $crawler = $client->followRedirect();
        $this->assertEquals(1, $crawler->filter('html:contains("La tâche")')->count());
    }

}