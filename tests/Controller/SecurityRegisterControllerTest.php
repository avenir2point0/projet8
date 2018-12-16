<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 17/12/2018
 * Time: 01:08
 */

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityRegisterControllerTest extends WebTestCase
{
    public function testRegisterPage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/users/create');
        $buttonCrawlerNode = $crawler->selectButton('Ajouter');
        $form = $buttonCrawlerNode->form();
        $client->submit($form, [
            'user[username]' => rand(0, 10000).'username',
            'user[password][first]' => 'admin',
            'user[password][second]' => 'admin',
            'user[email]' => rand(0, 10000).'test@test.fr',
            'user[roles][1]' => 'ROLE_ADMIN'
        ]);


        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }
}