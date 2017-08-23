<?php

namespace Kyto\Shapes;

/**
 * Class Polygon
 * @package Shapes
 */
class Polygon extends Shape
{
    /**
     * @inheritdoc
     */
    public function getShapeData(): array
    {
        $wrappingChar = $this->getSurroundingCharacter();
        $drawingChar = $this->getDrawingCharacter();
        $height = $this->getHeight();

        $middleChars = 5;

        switch($height) {
            case 5:
                $middleChars = 5;
            break;

            case 7:
                $middleChars = 9;
            break;

            case 11:
                $middleChars = 15;
            break;
        }

        $lowerPart = [];
        $middleLine = '';
        $lines = (int)($height / 2);
        $charsPerLine = $middleChars;

        for ($line = $lines, $spaces = 1; $line >= 1; $line--, $spaces += 2) {

            switch ($line) {
                case $lines:
                    $middleLine = sprintf(
                        '%s%s%s',
                        $wrappingChar,
                        str_repeat($drawingChar, $charsPerLine),
                        $wrappingChar
                    );
                    continue;

                case 1:
                    if ($charsPerLine < 1) {
                        $spaces += $charsPerLine;
                    }

                    $lowerPart[] = sprintf(
                        '%s%s',
                        str_repeat(' ', $spaces),
                        $drawingChar
                    );
                    $lowerPart[] = sprintf(
                        '%s%s',
                        str_repeat(' ', $spaces),
                        $wrappingChar
                    );
                    continue;

                default:
                    $lowerPart[] = sprintf(
                        '%s%s',
                        str_repeat(' ', $spaces),
                        str_repeat($drawingChar, $charsPerLine)
                    );
            }

            $charsPerLine -= 4;
        }

        $lines = array_reverse($lowerPart);
        $lines[] = $middleLine;
        $lines = array_merge($lines, $lowerPart);

        return $lines;
    }
}