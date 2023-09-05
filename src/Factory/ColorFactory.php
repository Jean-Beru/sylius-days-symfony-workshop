<?php

namespace App\Factory;

use App\Entity\Color;

class ColorFactory
{
    public function __invoke(): Color
    {
        $code = bin2hex(random_int(0, 2e6));

        $color = new Color();
        $color->setName("Color #$code");
        $color->setCode($code);
        $color->setReference('A beautiful color.');

        return $color;
    }
}
