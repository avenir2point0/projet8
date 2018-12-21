<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 22/12/2018
 * Time: 01:28
 */

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TaskDetailsControllerTest extends WebTestCase
{
    public function testTaskDetailsPage()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/task/4', array(), array(), array(
            'PHP_AUTH_USER' => 'admin@admin.fr',
            'PHP_AUTH_PW'   => 'admin',
        ));

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

}