<?php

class CategoryRepositoryTest extends TestCase {

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testCanFindById()
    {
        $repo = $this->app->make('CategoryRepository');
        $cat = $repo->findById(1);

        $this->assertInstanceOf('Category', $cat);
        $this->assertEquals(1, $cat->id);
        /*
        $crawler = $this->client->request('GET', '/');

        $this->assertTrue($this->client->getResponse()->isOk());

        $this->assertCount(1, $crawler->filter('h1:contains("Hello World!")'));
         */
    }

    public function testCanFindByName()
    {
        $repo = $this->app->make('CategoryRepository');
        $cat = $repo->findByName('General');

        $this->assertInstanceOf('Category', $cat);
        $this->assertEquals('General', $cat->name);
    }
}
