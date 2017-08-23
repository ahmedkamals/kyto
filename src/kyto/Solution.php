<?php

namespace Kyto;

use Kyto\Exception\InvalidArgumentException;
use Kyto\Shapes\Polygon;
use Kyto\Shapes\Shape;
use Kyto\Shapes\Triangle;

/**
 * Class Solution
 * @package Kyto
 */
class Solution
{
    const SURROUNDING_CHARACTER = '+';
    const DRAWING_CHARACTER = 'X';
    const LINE_SEPARATOR = PHP_EOL;

    /**
     * @param array $args
     */
    public function run(array $args)
    {
        $sizeIndex = $args['size'];

        if (!in_array($sizeIndex, Shape::SIZES)) {
            throw new InvalidArgumentException('Wrong argument.');
        }

        $size = Shape::SIZES[$sizeIndex];

        $shapes = $this->getShapes($size);
        $this->render($shapes, static::LINE_SEPARATOR);
    }

    /**
     * @param string $size
     *
     * @return array|[]Shape
     */
    public function getShapes(string $size): array
    {
        return [
            $this->getPolygon(
                $size,
                static::SURROUNDING_CHARACTER,
                static::DRAWING_CHARACTER
            ),
            $this->getTriangle(
                $size,
                static::SURROUNDING_CHARACTER,
                static::DRAWING_CHARACTER
            )
        ];
    }

    /**
     * @param string $size
     * @param string $surroundingCharacter
     * @param string $drawingCharacter
     *
     * @return Shape
     */
    private function getPolygon(
        string $size,
        string $surroundingCharacter,
        string $drawingCharacter
    ): Shape
    {
        return new Polygon($size, $surroundingCharacter, $drawingCharacter);
    }

    /**
     * @param string $size
     * @param string $surroundingCharacter
     * @param string $drawingCharacter
     *
     * @return Shape
     */
    private function getTriangle(
        string $size,
        string $surroundingCharacter,
        string $drawingCharacter
    ): Shape
    {
        return new Triangle($size, $surroundingCharacter, $drawingCharacter);
    }

    /**
     * @param array|Shape[]  $shapes
     * @param string         $lineSeparator
     */
    public function render(array $shapes, string $lineSeparator)
    {
        $size = count($shapes);

        foreach ($shapes as $key => $shape) {
            echo implode($shape->getShapeData(), $lineSeparator),
            $key < $size - 1? str_repeat($lineSeparator, 3) : $lineSeparator;
        }
    }
}

