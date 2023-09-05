<?php

namespace App\Factory;

use App\Entity\Color;

class ColorFactory
{
    public function __invoke(): Color
    {
        $code = str_pad(dechex(random_int(0, 2e6)), 6, '0', \STR_PAD_LEFT);

        $color = new Color();
        $color->setName("Color #$code");
        $color->setCode($code);
        $color->setReference('A beautiful color.');

        return $color;
    }
}
