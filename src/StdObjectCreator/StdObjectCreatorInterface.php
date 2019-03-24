<?php

namespace ObjectCreator\StdObjectCreator;

interface StdObjectCreatorInterface
{
    /**
     * StdObjectCreatorInterface constructor.
     * @param \stdClass $data
     */
    public function __construct(\stdClass $data = null);
}