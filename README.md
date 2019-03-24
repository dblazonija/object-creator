# Object Creator 
[![Travis (.com)](https://img.shields.io/travis/com/domagoj03/object-creator.svg?style=for-the-badge)](https://travis-ci.com/domagoj03/object-creator)

## Intro

This simple library was first and foremost created because I noticed that I use the funcionallity it provides across
several projects and instead of re-writing the logic again and again, I've decided to mold this into a library, mostly for my
conveniance, but also publish it as an open-source project in order to help anyone else who might
find it useful. 

## Installation

![Packagist](https://img.shields.io/packagist/v/domagoj03/object-creator.svg?style=for-the-badge)
![PHP from Packagist](https://img.shields.io/packagist/php-v/domagoj03/object-creator.svg?style=for-the-badge)

``` composer require domagoj03/object-creator```

## Usage

Intended usage is to extend the abstracts of the library and instantiate objects by passing 
data to your object's constructor. For example, when you receive data as a result of an API call,
you might get it as an array or as \stdClass. Then instead of accessing that data as 
`$data['value']`, you could acess it as `$object->getValue()` thus mitigating possible errors
and additional checks like `isset($data['value'])` before using it.

You can find some inspiration inside `tests/Helpers`

This method proved very handy in situations where I had to handle different data
structure received, for example, from an API calls or Webhooks. It's also useful when 
you have to handle multiple external API integrations.

### v1.0

* Define object which represents data in your application
* Make it extend desired library abstract
* Generate getters and setters for your properties (in this case for `number`). 
Remember that index of an associative array is property of your class and 
value represents the property/key of the data you wish to create object from.

```php 
class DemoObject extends ArrayObjectCreator // or StdClassObjectCreator
{
    protected $propertyMapper = [
        'number' => 'SomeNumber',
    ];
    
    /**
     * @var int
     */
    private $number;

    /**
     * @return int
     */
    public function getNumber(): ?int
    {
        return $this->number;
    }

    /**
     * @param int $number
     * @return DemoObjectFromArray
     */
    public function setNumber(int $number): DemoObjectFromArray
    {
        $this->number = $number;

        return $this;
    }
}
```

* When you need to use that received `$data`, instantiate your object
and pass the `$data` to a constructor.

#### Data as array

```php
// Usually as a result of an API call
$data = [
    'SomeNumber' => 23
];

$object = new DemoObject($data);
$object->getNumber(); // 23
```

#### Data as stdClass

```php
$data = new \stdClass();
$data->number = 23;


$object = new DemoObject($data); // Has to extend StdClassObjectCreator
$object->getNumber(); // 23
```

* This is a fairly simple example but shows what the library does in a nutshell.

### v0.1 [not recommended]

* Has only `ArrayObjectCreator`
* `ArrayObjectCreator` will not set `null` values


## Tests

`vendor/bin/phpunit`

## Contributing

Contributing is always welcome. 

If you have suggestions or problems with usage, you can open up an issue. 

If you want to help with the issues, fork the repository, make sure you have latest version
of the code and that the current tests pass, create new branch, work on the feature or bug (and add test cases), push the code to your repository and create a PR 
to this repository `master` branch mentioning the issue it's resolving.