<?php

namespace App\Tests\Functional\Post;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PostTest extends WebTestCase
{
    public function testBlogPageWorks(): void
    {
        $client = static::createClient();

        $client->request(Request::METHOD_GET, '/');

        $this->assertResponseIsSuccessful();
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        // Ici, on voit comment tester le contenu de notre page au sein de nos test fonctionnels
        $this->assertSelectorExists('h1');
        $this->assertSelectorTextContains('h1', 'SymBlog : Le blog créé de A à Z avec Symfony !');
    }
}
