<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CatalogTest extends TestCase
{
//    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_page_is_available(): void
    {
        $response = $this->get('/catalog');

        $response->assertStatus(200);
    }

    public function test_page_has_products()
    {
        $response = $this->get('/catalog?category=nft');

        $response->assertSeeText('NFT | ');
    }

    public function test_can_create_artwork()
    {
        $artwork = \Artwork::factory()->create();

        $this->assertDatabaseHas('artworks', $artwork->get('name'));
    }
}
