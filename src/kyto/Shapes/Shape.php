<?php

namespace Kyto\Shapes;

/**
 * Class Shape
 * @package Shapes
 */
Abstract class Shape
{
    const SIZE_SMALL = 0;
    const SIZE_MEDIUM = 1;
    const SIZE_LARGE = 2;

    const SIZES = [self::SIZE_SMALL, self::SIZE_MEDIUM, self::SIZE_LARGE];

    const LINE_HEIGHTS = [
        self::SIZE_SMALL => 5,
        self::SIZE_MEDIUM => 7,
        self::SIZE_LARGE => 11,
    ];

    /**
     * @var string
     */
    private $size;

    /**
     * @var string
     */
    private $surroundingCharacter;

    /**
     * @var string
     */
    private $drawingCharacter;

    /**
     * Shape constructor.
     *
     * @param string $size
     * @param string $surroundingCharacter
     * @param string $drawingCharacter
     */
    public function __construct($size, $surroundingCharacter, $drawingCharacter)
    {
        $this->size = $size;
        $this->surroundingCharacter = $surroundingCharacter;
        $this->drawingCharacter = $drawingCharacter;
    }


    /**
     * @return int
     */
    protected function getHeight(): int
    {
        switch ($this->size) {
            case static::SIZE_SMALL:
            case static::SIZE_MEDIUM:
            case static::SIZE_LARGE:
                return static::LINE_HEIGHTS[$this->size];
        }

        return static::LINE_HEIGHTS[rand(0, count(static::LINE_HEIGHTS) - 1)];
    }

    /**
     * @return string
     */
    public function getSize(): string
    {
        return $this->size;
    }

    /**
     * @return string
     */
    public function getSurroundingCharacter(): string
    {
        return $this->surroundingCharacter;
    }

    /**
     * @return string
     */
    public function getDrawingCharacter(): string
    {
        return $this->drawingCharacter;
    }

    /**
     * @return array
     */
    abstract public function getShapeData(): array;
}