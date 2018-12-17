<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 17/12/2018
 * Time: 04:34
 */

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TaskToggleControllerTest extends WebTestCase
{
    public function testTaskToggleTrue()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/tasks/3/toggle');
        $crawler = $client->followRedirect();

        $this->assertSame(1, $crawler->filter('html:contains("faite.")')->count());
    }
}
