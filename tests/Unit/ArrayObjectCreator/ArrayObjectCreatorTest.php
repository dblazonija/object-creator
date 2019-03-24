<?php

namespace Test\Unit\ArrayObjectCreator;

use PHPUnit\Framework\Assert;
use Test\Helpers\DemoObjectFromArray;
use Test\TestSuite;

class ArrayObjectCreatorTest extends TestSuite
{
    /**
     * @var array
     */
    private $data = [
        'SomeNumber' => 451,
        'SomeText' => 'Lorem ipsum dolor sit amet.'
    ];

    public function testArrayObjectCreatorWillCreateObjectFromArrayAndRemovePropertyMapper()
    {
        $object = new DemoObjectFromArray($this->data);

        Assert::assertIsInt($object->getNumber());
        Assert::assertEquals(451, $object->getNumber());
        Assert::assertEquals('Lorem ipsum dolor sit amet.', $object->getText());
    }

    /**
     * @see \Test\Unit\StdObjectCreator\StdObjectCreatorTest::testStdObjectCreatorWillCreateObjectFromStdObject
     */
    public function testArrayObjectCreatorWillCreateObjectFromArray()
    {
        $object = new DemoObjectFromArray($this->data);

        Assert::assertIsInt($object->getNumber());
        Assert::assertEquals(451, $object->getNumber());
        Assert::assertEquals('Lorem ipsum dolor sit amet.', $object->getText());
    }
}