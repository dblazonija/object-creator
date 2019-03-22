<?php

namespace Test\Helpers;

use ObjectCreator\ArrayObjectCreator\ArrayObjectCreator;

class DemoObject extends ArrayObjectCreator
{
    protected $propertyMapper = [
        'number' => 'SomeNumber',
        'text' => 'SomeText'
    ];

    /**
     * @var int
     */
    private $number;

    /**
     * @var string
     */
    private $text;

    /**
     * @return int
     */
    public function getNumber(): ?int
    {
        return $this->number;
    }

    /**
     * @param int $number
     * @return DemoObject
     */
    public function setNumber(int $number): DemoObject
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return string
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return DemoObject
     */
    public function setText(string $text): DemoObject
    {
        $this->text = $text;

        return $this;
    }
}