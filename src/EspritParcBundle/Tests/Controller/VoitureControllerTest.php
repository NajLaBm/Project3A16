<?php

namespace EspritParcBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class VoitureControllerTest extends WebTestCase
{
    public function testAfficher()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/afficher');
    }

}
