<?php

namespace App\Service;

use App\Models\Link;
use Illuminate\Support\Str;

class UrlGenerator
{
    public function __construct(public int $length = 5)
    {

    }

    /**
     * Generate a unique and random code using simple randomizing string
     *
     * @return string
     */
    public function generateRandom(): string
    {
        $code = '';

        do {
            $code = Str::random($this->length);

        } while (Link::whereCode($code)->exists());

        return $code;
    }
}
