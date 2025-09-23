<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class EntryControllerTest extends WebTestCase
{
    public function testCreateEntry(): void
    {
        $client = static::createClient();

        $client->request(
            'POST',
            '/entry',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode([
                'type' => 'INCOME',
                'description' => 'description',
                'amount' => 10.12,
            ])
        );

        $this->assertResponseIsSuccessful();
        $this->assertResponseFormatSame('json');

        $data = json_decode($client->getResponse()->getContent(), true);
        $this->assertArrayHasKey('id', $data);
        $this->assertIsInt($data['id']);
    }
}
