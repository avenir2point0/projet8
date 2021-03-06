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
        $crawler = $client->request('GET', '/users/create', array(), array(), array(
            'PHP_AUTH_USER' => 'admin@admin.fr',
            'PHP_AUTH_PW'   => 'admin',
        ));

        $buttonCrawlerNode = $crawler->selectButton('Ajouter');
        $form = $buttonCrawlerNode->form();
        $client->submit($form, [
            'user[username]' => rand(0, 10000).'username',
            'user[password][first]' => 'admin',
            'user[password][second]' => 'admin',
            'user[email]' => rand(0, 10000).'test@test.fr',
            'user[roles][0]' => 'ROLE_USER'
        ]);


        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }
}
