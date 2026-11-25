<?php

abstract class Shape
{
    protected float $x;
    protected float $y;
    protected string $color;

    public function __construct(float $x, float $y, string $color)
    {
        $this->x = $x;
        $this->y = $y;
        $this->setColor($color);
    }

    public function getX(): float
    {
        return $this->x;
    }

    public function getY(): float
    {
        return $this->y;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): void
    {
        if (!preg_match('/^#[0-9a-fA-F]{6}$/', $color) && !preg_match('/^#[0-9a-fA-F]{3}$/', $color)) {
            throw new InvalidArgumentException('Color must be a valid 3-digit or 6-digit hex color, for example #ff0000.');
        }

        $this->color = strtolower($color);
    }

    public function move(float $dx, float $dy): void
    {
        $this->x += $dx;
        $this->y += $dy;
    }
}
