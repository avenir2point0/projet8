<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 17/12/2018
 * Time: 05:10
 */

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testUsersListPage()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/users', array(), array(), array(
            'PHP_AUTH_USER' => 'admin@admin.fr',
            'PHP_AUTH_PW'   => 'admin',
        ));

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
