<?php

namespace Test\Helpers;

use ObjectCreator\ArrayObjectCreator\ArrayObjectCreator;

class DemoObjectFromArray extends ArrayObjectCreator
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
     * @return DemoObjectFromArray
     */
    public function setNumber(int $number): DemoObjectFromArray
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
     * @return DemoObjectFromArray
     */
    public function setText(string $text): DemoObjectFromArray
    {
        $this->text = $text;

        return $this;
    }
}