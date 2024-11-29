<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StaticPageTest extends TestCase
{
    // タイトルの固定文言部分を各テストケースで共有する
    private static $static_title;

    public static function setUpBeforeClass(): void
    {
        self::$static_title = "Ruby on Rails Tutorial Sample App";
    }

    /**
     * HTMLから<title>タグの内容を抽出
     *
     * @param string $html
     * @return string
     */
    private function extractTitle(string $html): string
    {
        preg_match('/<title>(.*?)<\/title>/', $html, $matches);

        return $matches[1] ?? '';
    }

    /**
     * homeページへのアクセスが正常であること
     */
    public function test_home_page_returns_a_successful_response(): void
    {
        $response = $this->get('/static_pages/home');
        $response->assertStatus(200);
        // ページ内容からタイトルを抽出
        $title = $this->extractTitle($response->getContent());
        $this->assertStringContainsString("Home | " . self::$static_title, $title);
    }

    /**
     * helpページへのアクセスが正常であること
     */
    public function test_help_page_returns_a_successful_response(): void
    {
        $response = $this->get('/static_pages/help');
        $response->assertStatus(200);
        $title = $this->extractTitle($response->getContent());
        $this->assertStringContainsString("Help | " . self::$static_title, $title);
    }

    /**
     * aboutページへのアクセスが正常であること
     */
    public function test_about_page_returns_a_successful_response(): void
    {
        $response = $this->get('/static_pages/about');
        $response->assertStatus(200);
        $title = $this->extractTitle($response->getContent());
        $this->assertStringContainsString("About | " . self::$static_title, $title);
    }

}
