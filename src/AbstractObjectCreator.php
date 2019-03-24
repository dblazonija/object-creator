<?php

namespace ObjectCreator;

abstract class AbstractObjectCreator implements ObjectCreatorInterface
{
    /**
     * @var array
     */
    protected $propertyMapper = [];

    /**
     * AbstractObjectCreator constructor.
     * @param bool $removePropertyMapper
     */
    public function __construct(bool $removePropertyMapper = true)
    {
        if ($removePropertyMapper) {
            unset($this->propertyMapper);
        }
    }
}