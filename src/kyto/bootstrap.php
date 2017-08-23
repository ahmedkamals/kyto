<?php

namespace Kyto;

use Kyto\Shapes\Shape;
use \InvalidArgumentException;

require __DIR__.'/../../vendor/autoload.php';

try {

    $sizeIndex = rand(0, count(Shape::SIZES) - 1);

    if (count($argv) >= 2) {
        $sizeIndex = $argv[1];
    }

    (new Solution())->run(['size' => $sizeIndex]);
} catch (InvalidArgumentException $e) {
    echo 'Error: ', $e->getMessage();
}