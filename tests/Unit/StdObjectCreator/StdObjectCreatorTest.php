<?php

namespace Test\Unit\StdObjectCreator;

use PHPUnit\Framework\Assert;
use Test\Helpers\DemoObjectFromStd;
use Test\TestSuite;

class StdObjectCreatorTest extends TestSuite
{
    /**
     * @var \stdClass
     */
    private $data;

    protected function setUp(): void
    {
        $this->data = new \stdClass();
        $this->data->identifier = 0;
        $this->data->demoText = 'Lorem ipsum dolor.';
        $this->data->dataAsAnotherObject = (new \stdClass());
    }

    public function testStdObjectCreatorWillCreateObjectFromStdObjectAndRemovePropertyMapper()
    {
        $object = new DemoObjectFromStd($this->data);

        Assert::assertInstanceOf(DemoObjectFromStd::class, $object);
        Assert::assertEquals(0, $object->getId());
        Assert::assertEquals('Lorem ipsum dolor.', $object->getTitle());
        Assert::assertInstanceOf(\stdClass::class, $object->getData());
    }

    /**
     * We cannot assert that the propertyMapper doesn't exists
     * because PHP's \property_exists() will return true even
     * if we unset the object property and the propertyMapper
     * shouldn't be public member in any case
     *
     * @see http://php.net/manual/en/function.property-exists.php#116824
     */
    public function testStdObjectCreatorWillCreateObjectFromStdObject()
    {
        $object = new DemoObjectFromStd($this->data, false);

        Assert::assertInstanceOf(DemoObjectFromStd::class, $object);
        Assert::assertEquals(0, $object->getId());
        Assert::assertEquals('Lorem ipsum dolor.', $object->getTitle());
        Assert::assertInstanceOf(\stdClass::class, $object->getData());
    }
}