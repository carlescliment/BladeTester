ChainedStubsBundle
=================


## Description

This bundle allows you to stub easily objects with chained methods, for example in repositories like:

```
    $em->getConnection()->executeQuery()->fetchAll();
```

## Installation

### Step 1: Install bundle

#### Symfony 2.0.x: Add the following lines to your  `deps` file and then run `php bin/vendors install`:

```
[BladeTesterBundle]
    git=https://github.com/carlescliment/BladeTester
    target=bundles/BladeTester
```

#### Register the BladeTesterBundle namespace
```
    // app/autoload.php
    $loader->registerNamespaces(array(
        'BladeTester'            => __DIR__.'/../vendor/bundles',
        // your other namespaces
    ));
```


#### Symfony 2.1.x: Add the following lines to your  `composer.json` file and then run `composer update`:

```
    "require": {
		...
        "carlescliment/chained-stubs-bundle": "*"
        ...
    },
```

### Step 2: Enable the bundle

#### Add BladeTesterBundle to your application kernel
```
    // app/AppKernel.php
    public function registerBundles()
    {
        return array(
            // ...
            new BladeTester\ChainedStubsBundle\BladeTesterChainedStubsBundle();
            // ...
        );
    }
```


## Usage

```
    <?php

    namespace My\SampleBundle\Tests;

    use BladeTester\ChainedStubsBundle\Model\StubChainer;

    class SampleTest extends \PHPUnit_Framework_TestCase {

        private $stubChainer;
        private $objectManager;

        public function setUp() {
            $this->stubChainer = new StubChainer($this);
            $this->objectManager = $this->getMock('Doctrine\Common\Persistence\ObjectManager');
        }


        public function testICanChainStubCalls() {
            // Arrange
            $expectedResult = array('item1', 'item2');
            $this->stubChainer->chain($this->objectManager, array('getConnection', 'executeQuery', 'fetchAll'), $expectedResult);
            $sut = new ClassThatUsesManager($this->objectManager);

            // Act
            $result = $sut->getResults(); // Imagine that the SUT performs the call
                                          // $om->getConnection()->executeQuery('Some query here')->fetchAll()
                                          // and returns the value
            
            // Assert
            $this->assertEquals($expectedResult, $result);
        }

    }

````
