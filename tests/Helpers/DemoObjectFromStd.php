<?php

namespace Test\Helpers;

use ObjectCreator\StdObjectCreator\StdObjectCreator;

class DemoObjectFromStd extends StdObjectCreator
{
    /**
     * @var array
     */
    protected $propertyMapper = [
        'id' => 'identifier',
        'title' => 'demoText',
        'data' => 'dataAsAnotherObject'
    ];

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var \stdClass
     */
    private $data;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return DemoObjectFromStd
     */
    public function setId(int $id): DemoObjectFromStd
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return DemoObjectFromStd
     */
    public function setTitle(string $title): DemoObjectFromStd
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return \stdClass
     */
    public function getData(): ?\stdClass
    {
        return $this->data;
    }

    /**
     * @param \stdClass $data
     * @return DemoObjectFromStd
     */
    public function setData(\stdClass $data): DemoObjectFromStd
    {
        $this->data = $data;

        return $this;
    }
}