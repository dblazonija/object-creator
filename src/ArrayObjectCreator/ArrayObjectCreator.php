<?php

namespace ObjectCreator\ArrayObjectCreator;

use ObjectCreator\AbstractObjectCreator;
use Symfony\Component\PropertyAccess\PropertyAccess;

/**
 * Instantiates an object from an array of data passed to a constructor
 *
 * Class ArrayObjectCreator
 * @package ObjectCreator\ArrayObjectCreator
 */
abstract class ArrayObjectCreator extends AbstractObjectCreator implements ArrayObjectCreatorInterface
{
    /**
     * ArrayObjectCreator constructor.
     * @param array $data
     * @param bool $removePropertyMapper
     */
    public function __construct(array $data = null, bool $removePropertyMapper = true)
    {
        if ($data) {
            $accessor = PropertyAccess::createPropertyAccessor();
            foreach ($this->propertyMapper as $objectElement => $dataElement) {
                if ($accessor->isReadable($this, $objectElement) && array_key_exists($dataElement, $data)) {
                    $accessor->setValue($this, $objectElement, $data[$dataElement]);
                }
            }
        }

        parent::__construct($removePropertyMapper);
    }
}