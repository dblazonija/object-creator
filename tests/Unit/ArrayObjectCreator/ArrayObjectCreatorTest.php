<?php

namespace Test\Unit\ArrayObjectCreator;

use PHPUnit\Framework\Assert;
use Test\Helpers\DemoObject;
use Test\TestSuite;

class ArrayObjectCreatorTest extends TestSuite
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testArrayObjectCreatorWillCreateObjectFromArray()
    {
        $data = [
            'SomeNumber' => 451,
            'SomeText' => 'Lorem ipsum dolor sit amet.'
        ];

        $object = new DemoObject($data);

        Assert::assertIsInt($object->getNumber());
        Assert::assertEquals(451, $object->getNumber());
        Assert::assertEquals('Lorem ipsum dolor sit amet.', $object->getText());
    }
}