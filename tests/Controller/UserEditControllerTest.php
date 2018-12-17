<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 17/12/2018
 * Time: 05:22
 */

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserEditControllerTest extends WebTestCase
{
    public function testUserEditPage()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/users/4/edit', array(), array(), array(
            'PHP_AUTH_USER' => 'admin@admin.fr',
            'PHP_AUTH_PW'   => 'admin',
        ));

        $form = $crawler->selectButton('Modifier')->form();
        $form['user[username]'] = 'testuser';
        $form['user[password][first]'] = 'testuser';
        $form['user[password][second]'] = 'testuser';
        $form['user[email]'] = 'testtesttest@test.fr';
        $form['user[roles][0]'] = 'ROLE_USER';

        $client->submit($form);
        $crawler = $client->followRedirect();

        $this->assertEquals(1, $crawler->filter('html:contains("utilisateur")')->count());
    }
}
