<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 17/12/2018
 * Time: 01:01
 */

namespace App\Tests\Controller;


use App\Controller\SecurityLogoutController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityLogoutControllerTest extends WebTestCase
{
    public function testLogoutPage()
    {
        $client = static::createClient();
        $client->followRedirects();

        $client->request('GET', '/logout');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testLogout()
    {
        $securityController = new SecurityLogoutController();
        static::assertNull($securityController->logout());
    }
}
