<?php

namespace Tests\Feature\Http\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
    }

    public function testNewsCreateSuccess(): void
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertStatus(200);
    }

    public function testNewsStoreSuccess(): void
    {
        $postData = [
            'title' => fake()->jobTitle(),
            'author' => fake()->userName(),
            'status' => 'draft',
            'description' => fake()->text(100),
        ];

        $response = $this->post(route('admin.news.store'), $postData);
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson($postData);
    }

    public function testNewsStoreError(): void
    {
        $postData = [
            'author' => fake()->userName(),
            'status' => 'draft',
            'description' => fake()->text(100),
        ];

        $response = $this->post(route('admin.news.store'), $postData);
        $response->assertFound();
    }

    public function testNewsShowSuccess(): void
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertStatus(200);
    }
}
