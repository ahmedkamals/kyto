<?php

namespace Kyto\Tests;

use Kyto\Shapes\Polygon;
use Kyto\Shapes\Triangle;
use PHPUnit\Framework\TestCase;
use \InvalidArgumentException;
use Kyto\Solution;

/**
 * Class SolutionTest
 * @package Kyto\Tests
 */
class SolutionTest extends TestCase
{
    /**
     * @return array
     */
    public function getShapesDataProvider(): array
    {
        return [
            'Should return an array of polygon an triangle.' => [
                'size' => 0,
                'expected' => [
                    new Polygon(0, '+', 'X'),
                    new Triangle(0, '+', 'X'),
                ],
            ],
        ];
    }

    /**
     * @param int $size
     * @param array $expected
     *
     * @dataProvider getShapesDataProvider
     */
    public function testShouldGetShapesCorrectly(int $size, array $expected)
    {
        $solution = new Solution();
        $result = $solution->getShapes($size);
        $this->assertCount(count($expected), $result);

        foreach($expected as $key => $val) {
            $this->assertEquals($val, $result[$key]);
        }
    }

    /**
     * @return array
     */
    public function throwInvalidArgumentExceptionDataProvider(): array
    {
        return [
            'Having character in the set.' => [
                'args' => ['size' => 10],
                'exception' => InvalidArgumentException::class,
            ],
        ];
    }

    /**
     * @param array  $args
     * @param string $exception
     *
     * @dataProvider throwInvalidArgumentExceptionDataProvider
     */
    public function testShouldThrowInvalidArgumentException(array $args, string $exception)
    {
        $this->expectException($exception);
        (new Solution())->run($args);
    }
}
