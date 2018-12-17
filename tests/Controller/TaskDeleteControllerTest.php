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
            'PHP_AUTH_USER' => 'user@user.fr',
            'PHP_AUTH_PW'   => 'user',
        ));

        $crawler = $client->followRedirect();
        $this->assertSame(1, $crawler->filter('html:contains("La tâche")')->count());
    }

    public function testTaskDeletePageByUserFalse()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/tasks/1/delete', array(), array(), array(
            'PHP_AUTH_USER' => 'user@user.fr',
            'PHP_AUTH_PW'   => 'user',
        ));

        $crawler = $client->followRedirect();
        $this->assertSame(1, $crawler->filter('html:contains("Vous ne")')->count());
    }

    public function testTaskDeletePageByAdmin()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/tasks/1/delete', array(), array(), array(
            'PHP_AUTH_USER' => 'admin@admin.fr',
            'PHP_AUTH_PW'   => 'admin',
        ));

        $crawler = $client->followRedirect();
        $this->assertSame(1, $crawler->filter('html:contains("La tâche")')->count());
    }
}
