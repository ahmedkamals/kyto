<?php

namespace Kyto\Tests\Shapes;

use Kyto\Shapes\Triangle;
use PHPUnit\Framework\TestCase;

/**
 * Class TriangleTest
 * @package Kyto\Tests\Shapes
 */
class TriangleTest extends TestCase
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
                    '  XXX',
                    ' XXXXX',
                    'XXXXXXX',
                ],
            ],
            'Medium size' => [
                'size' => 1,
                'surroundingCharacter' => '+',
                'drawingCharacter' => 'X',
                'expected' => [
                    '     +',
                    '     X',
                    '    XXX',
                    '   XXXXX',
                    '  XXXXXXX',
                    ' XXXXXXXXX',
                    'XXXXXXXXXXX',
                ],
            ],
            'Large size' => [
                'size' => 2,
                'surroundingCharacter' => '+',
                'drawingCharacter' => 'X',
                'expected' => [
                    '         +',
                    '         X',
                    '        XXX',
                    '       XXXXX',
                    '      XXXXXXX',
                    '     XXXXXXXXX',
                    '    XXXXXXXXXXX',
                    '   XXXXXXXXXXXXX',
                    '  XXXXXXXXXXXXXXX',
                    ' XXXXXXXXXXXXXXXXX',
                    'XXXXXXXXXXXXXXXXXXX',
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
        $triangle = new Triangle($size, $surroundingCharacter, $drawingCharacter);
        $this->assertEquals($expected, $triangle->getShapeData());
    }
}