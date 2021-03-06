<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 17/12/2018
 * Time: 04:41
 */

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TaskDoneControllerTest extends WebTestCase
{
    public function testTaskDonePage()
    {
        $client = static::createClient();

        $client->request('GET', '/tasks/done', array(), array(), array(
            'PHP_AUTH_USER' => 'admin@admin.fr',
            'PHP_AUTH_PW'   => 'admin',
        ));

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
