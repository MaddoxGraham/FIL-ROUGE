<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('shuffleArray', [$this, 'shuffleArray']),
        ];
    }

    public function shuffleArray(array $array)
    {
        shuffle($array);
        return $array;
    }
}
