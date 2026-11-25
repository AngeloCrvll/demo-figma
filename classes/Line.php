<?php

require_once __DIR__ . '/Shape.php';

class Line extends Shape
{
    private float $x2;
    private float $y2;

    public function __construct(float $x1, float $y1, float $x2, float $y2, string $color)
    {
        parent::__construct($x1, $y1, $color);
        $this->x2 = $x2;
        $this->y2 = $y2;
    }

    public function getX2(): float
    {
        return $this->x2;
    }

    public function getY2(): float
    {
        return $this->y2;
    }

    public function move(float $dx, float $dy): void
    {
        parent::move($dx, $dy);
        $this->x2 += $dx;
        $this->y2 += $dy;
    }

    public function getCssStyle(): string
    {
        $dx = $this->x2 - $this->x;
        $dy = $this->y2 - $this->y;
        $length = sqrt(($dx * $dx) + ($dy * $dy));
        $angle = rad2deg(atan2($dy, $dx));

        return sprintf(
            'left: %s; top: %s; width: %spx; transform: rotate(%sdeg); background: %s;',
            $this->formatPixel($this->x),
            $this->formatPixel($this->y),
            $this->formatNumber($length),
            $this->formatNumber($angle),
            htmlspecialchars($this->color, ENT_QUOTES, 'UTF-8')
        );
    }

    private function formatPixel(float $value): string
    {
        return $this->formatNumber($value) . 'px';
    }

    private function formatNumber(float $value): string
    {
        return rtrim(rtrim(number_format($value, 2, '.', ''), '0'), '.');
    }
}
