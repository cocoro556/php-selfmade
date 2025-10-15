<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomePageTest extends TestCase
{
    // トップページが正しく開けるか
    public function test_top_page_status()
    {
        $response = $this->get('/typing'); // "/" にアクセス
        $response->assertStatus(200); // 200（成功）を期待
    }

    // ページ内に "TypeLearn" という文字があるか
    public function test_top_page_has_brand_text()
    {
        $response = $this->get('/typing');
        $response->assertSee('TypeLearn'); // ページにこの文字が含まれている？
    }
}