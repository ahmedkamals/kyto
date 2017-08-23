<?php

namespace Kyto\Shapes;

/**
 * Class Triangle
 * @package Shapes
 */
class Triangle extends Shape
{
    /**
     * @inheritdoc
     */
    public function getShapeData(): array
    {
        $wrappingChar = $this->getSurroundingCharacter();
        $drawingChar = $this->getDrawingCharacter();
        $height = $this->getHeight();
        $lines = [
            sprintf(
                '%s%s',
                str_repeat(' ', $height - 2),
                $wrappingChar
            ),
        ];

        for ($i = 0; $i < $height - 1; $i++) {
            $lines[] = sprintf(
                '%s%s',
                str_repeat(' ', $height - $i - 2),
                str_repeat($drawingChar, 2 * $i + 1)
            );
        }

        return $lines;
    }
}