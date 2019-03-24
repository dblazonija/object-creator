<?php

namespace ObjectCreator\StdObjectCreator;

use ObjectCreator\AbstractObjectCreator;
use Symfony\Component\PropertyAccess\PropertyAccess;

/**
 * Instantiates an object with data from \stdClass passed to a constructor.
 *
 * Class AbstractStdObjectCreator
 * @package ObjectCreator\StdObjectCreator
 */
abstract class StdObjectCreator extends AbstractObjectCreator implements StdObjectCreatorInterface
{
    /**
     * StdObjectCreatorInterface constructor.
     * @param \stdClass $data
     * @param bool $removePropertyMapper
     */
    public function __construct(\stdClass $data = null, bool $removePropertyMapper = true)
    {
        if ($data) {
            $accessor = PropertyAccess::createPropertyAccessor();
            foreach ($this->propertyMapper as $objectElement => $dataElement) {
                if ($accessor->isReadable($this, $objectElement) && property_exists($data, $dataElement)) {
                    $accessor->setValue($this, $objectElement, $data->{$dataElement});
                }
            }
        }

        parent::__construct($removePropertyMapper);
    }
}