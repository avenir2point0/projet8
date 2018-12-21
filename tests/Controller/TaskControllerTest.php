<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 17/12/2018
 * Time: 00:16
 */

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TaskControllerTest extends WebTestCase
{
    public function testTaskPage()
    {
        $client = static::createClient();

        $client->request('GET', '/tasks', array(), array(), array(
            'PHP_AUTH_USER' => 'admin@admin.fr',
            'PHP_AUTH_PW'   => 'admin',
        ));

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
