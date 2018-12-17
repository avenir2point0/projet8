<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 17/12/2018
 * Time: 03:54
 */

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TaskDeleteControllerTest extends WebTestCase
{
    public function testTaskDeletePageByUser()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/tasks/2/delete', array(), array(), array(
            'PHP_AUTH_USER' => '2331test@test.fr',
            'PHP_AUTH_PW'   => 'admin',
        ));

        $crawler = $client->followRedirect();
        $this->assertSame(1, $crawler->filter('html:contains("La tâche")')->count());
    }

    public function testTaskDeletePageByUserFalse()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/tasks/1/delete', array(), array(), array(
            'PHP_AUTH_USER' => '2331test@test.fr',
            'PHP_AUTH_PW'   => 'admin',
        ));

        $crawler = $client->followRedirect();
        $this->assertSame(1, $crawler->filter('html:contains("Vous ne")')->count());
    }

    public function testTaskDeletePageByAdmin()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/tasks/1/delete', array(), array(), array(
            'PHP_AUTH_USER' => '4269test@test.fr',
            'PHP_AUTH_PW'   => 'admin',
        ));

        $crawler = $client->followRedirect();
        $this->assertSame(1, $crawler->filter('html:contains("La tâche")')->count());
    }
}
