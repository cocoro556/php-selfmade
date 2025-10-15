<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class SampleTest extends TestCase
{
    // 1) 'I love PHP' に 'PHP' が含(ふく)まれる
    public function test_contains_php()
    {
        $result = 'I love PHP';
        $this->assertStringContainsString('PHP', $result,'I love PHP に PHP が含まれるはずです。');
    }

    // 2) 'Laravel makes testing fun' に 'test' が含まれる
    public function test_contains_substring()
    {
        $result = 'Laravel makes testing fun';
        $this->assertStringContainsString('test', $result,'Laravel makes testing fun に test が含まれるはずです。');
    }

    // 3) 空文字(からもじ)やスペースの扱(あつか)いを自分で決めて検証(けんしょう)
    public function test_edge_whitespace()
    {
        $result = ' ';
        $this->assertStringContainsString(' ', $result,' は スペース になるはずです。');
    }
}


    // // 1) 2 + 3 の結果(けっか)を確認（かくにん）
    // public function test_add()
    // {
    //     $result = 2 + 3;
    //     $this->assertEquals(5, $result,'2 + 3 は 5 になるはずです。');
    // }

    // // 2) 10 - 4 の結果を確認
    // public function test_subtract()
    // {
    //     $result = 10 - 4;
    //     $this->assertEquals(6, $result,'10 - 4 は 6 になるはずです。');
    // }

    // // 3) 3 * 3 の結果が 9「より大きい」か（true/false どちらで書く？）
    // public function test_multiply_is_greater_than()
    // {
    //     $result = 3 * 3;
    //     $this->assertTrue($result > 9,'3 * 3 は 9 より大きいはずです。');
    // }

    // // 4) 8 / 2 の結果が 5 と「等しくない」こと
    // public function test_divide_is_not_five()
    // {
    //     $result = 8 / 2;
    //     $this->assertNotEquals(4, $result,'8 / 2 は 5 と等しくないはずです。');
    // }

    // 足し算が正しいかテスト
    // public function test_add()
    // {
    //     $result = 2 + 3;
    //     $this->assertEquals(5, $result);
    // }

    // // 引き算が正しいかテスト
    // public function test_subtraction_is_correct()
    // {
    //     $result = 10 - 4;
    //     $this->assertEquals(6, $result);
    // }

    // // これはわざと失敗させるテスト
    // public function test_multiplication_is_wrong()
    // {
    //     $result = 2 * 4;
    //     $this->assertEquals(8, $result); // ここは本当は9が正しい
    // }



// test('example', function () {
//     expect(true)->toBeTrue();
// });

// test('2 + 3 = 5', function () {
//     expect(2 + 3)->toBe(5);
// });

// test('文字列にPHPが含まれる', function () {
//     expect('I love PHP')->toContain('PHP');
// });

