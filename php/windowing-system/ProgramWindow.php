<?php

declare(strict_types=1);

class ProgramWindow
{
    public function __construct(
        public $x = 0,
        public $y = 0,
        public $width = 800,
        public $height = 600,
    ) {
    }

    public function resize($size)
    {
        $this->height = $size->height;
        $this->width = $size->width;
    }

    public function move($position)
    {
        $this->y = $position->y;
        $this->x = $position->x;
    }
}
