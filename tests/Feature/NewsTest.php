<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testNewsAvailable()
    {
        $response = $this->get('/news');

        $response->assertStatus(200);
        $response->assertDontSeeText('Новость');
    }
    public function testNewsShow()
	{
		$response = $this->get(route('news.show', ['id' => mt_rand(1, 10)]));

		$response->assertStatus(200);
	}

    public function testOnlyOneNewsAvailable()
	{
		$id = mt_rand(1,10);
		$response = $this->get('/news/' . $id);

		$response->assertStatus(200);
	}

    public function testShowNewsStatusNotFound()
	{
		$response = $this->get(route('news.show', ['id' => mt_rand(11,100)]));

		$response->assertStatus(404);
	}

	public function testNewsAdminAvailable()
	{
		$response = $this->get(route('admin.news.index'));

		$response->assertStatus(200);
        $response->assertSeeText('Список');

	}

	public function testNewsCreateAdminAvailable()
	{
		$response = $this->get(route('admin.news.create'));

		$response->assertStatus(200);
	}

	public function testNewsAdminCreated()
	{
		$responseData = [
			'title' => 'Some title',
			'author' => 'Admin',
			'status' => 'DRAFT',
			'description' => 'Some text'
		];
		$response = $this->post(route('admin.news.store'), $responseData);
		$response->assertStatus(302);
	} 

    public function testAboutUrlAvailable()
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
    }

}
