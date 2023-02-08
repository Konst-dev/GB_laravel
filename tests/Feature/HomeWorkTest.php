<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeWorkTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRedirectFeedBackToCategories()
    {
        $data = [
            'name' => 'Иван',
            'comment' => 'OK'
        ];

        $response = $this->get(route('save.feedback'), $data);

        $response->assertRedirect(route('categories.show'));
    }
    public function testRedirectOrderToCategories()
    {
        $data = [
            'name' => 'Иван',
            'tel' => '123456789',
            'email' => '1@mail.ru',
            'comment' => 'sdfsfsdfds'
        ];

        $response = $this->get(route('save.order'), $data);

        $response->assertRedirect(route('categories.show'));
    }

    public function testNewsContent()
    {
        $response = $this->get(route('news', ['cat' => '2']));
        $response->assertSee('Оставить отзыв');
        $response->assertViewIs('news.index');
    }

    public function testNewsRightView()
    {
        $response = $this->get(route('news', ['cat' => '3']));
        $response->assertViewIs('news.index');
    }

    public function testOrderRightView()
    {
        $response = $this->get(route('order'));
        $response->assertViewIs('news.order');
    }
}
