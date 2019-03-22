<?php

namespace ObjectCreator\ArrayObjectCreator;

use ObjectCreator\AbstractObjectCreator;
use Symfony\Component\PropertyAccess\PropertyAccess;

abstract class ArrayObjectCreator extends AbstractObjectCreator implements ArrayObjectCreatorInterface
{
    /**
     * ArrayObjectCreator constructor.
     * @param array $data
     */
    public function __construct(array $data = null)
    {
        if ($data) {
            $accessor = PropertyAccess::createPropertyAccessor();
            foreach ($this->propertyMapper as $objectElement => $dataElement) {
                if ($accessor->isReadable($this, $objectElement) && isset($data[$dataElement])) {
                    $accessor->setValue($this, $objectElement, $data[$dataElement]);
                }
            }
        }
    }
}