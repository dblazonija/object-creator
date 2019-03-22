<?php

namespace ObjectCreator;

abstract class AbstractObjectCreator implements ObjectCreatorInterface
{
    /**
     * @var array
     */
    protected $propertyMapper = [];
}