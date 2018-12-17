<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 17/12/2018
 * Time: 00:54
 */

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityLoginControllerTest extends WebTestCase
{
    public function testLoginPage()
    {
        $client = static::createClient();

        $client->request('GET', '/login');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testLogin()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');
        $buttonCrawlerNode = $crawler->selectButton('Se connecter');
        $form = $buttonCrawlerNode->form();
        $client->submit($form, [
            'email' => 'admin@admin.fr',
            'password' => 'admin',

        ]);


        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }
}
