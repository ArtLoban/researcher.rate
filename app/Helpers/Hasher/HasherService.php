<?php

namespace App\Helpers\Hasher;

use Illuminate\Contracts\Hashing\Hasher;
use App\Helpers\Hasher\Contracts\HasherInterface;

class HasherService implements HasherInterface
{
    /**
     * @var Hasher
     */
    private $hasher;

    /**
     * HasherService constructor.
     * @param Hasher $hasher
     */
    public function __construct(Hasher $hasher)
    {
        $this->hasher = $hasher;
    }

    /**
     * @param string $string
     * @return string
     */
    public function make(string $string): string
    {
        return $this->hasher->make($string);
    }
}
