<?php

namespace Kyto\Tests\Shapes;

use Kyto\Shapes\Polygon;
use PHPUnit\Framework\TestCase;

/**
 * Class PolygonTest
 * @package Kyto\Tests\Shapes
 */
class PolygonTest extends TestCase
{
    /**
     * @return array
     */
    public function getShapeDataProvider(): array
    {
        return [
            'Small size' => [
                'size' => 0,
                'surroundingCharacter' => '+',
                'drawingCharacter' => 'X',
                'expected' => [
                    '   +',
                    '   X',
                    '+XXXXX+',
                    '   X',
                    '   +',
                ],
            ],
            'Medium size' => [
                'size' => 1,
                'surroundingCharacter' => '+',
                'drawingCharacter' => 'X',
                'expected' => [
                    '     +',
                    '     X',
                    '   XXXXX',
                    '+XXXXXXXXX+',
                    '   XXXXX',
                    '     X',
                    '     +',
                ],
            ],
            'Large size' => [
                'size' => 2,
                'surroundingCharacter' => '+',
                'drawingCharacter' => 'X',
                'expected' => [
                    '        +',
                    '        X',
                    '       XXX',
                    '     XXXXXXX',
                    '   XXXXXXXXXXX',
                    '+XXXXXXXXXXXXXXX+',
                    '   XXXXXXXXXXX',
                    '     XXXXXXX',
                    '       XXX',
                    '        X',
                    '        +',
                ],
            ]
        ];
    }

    /**
     * @param int    $size
     * @param string $surroundingCharacter
     * @param string $drawingCharacter
     * @param array  $expected
     *
     * @dataProvider getShapeDataProvider
     */
    public function testShouldGetShapeDataCorrectly(
        int $size,
        string $surroundingCharacter,
        string $drawingCharacter,
        array $expected
    )
    {
        $polygon = new Polygon($size, $surroundingCharacter, $drawingCharacter);
        $this->assertEquals($expected, $polygon->getShapeData());
    }
}