BladeTesterBundle
=================

## Installation

### Add the following lines to your  `deps` file and then run `php bin/vendors install`:

```
[BladeTesterBundle]
    git=https://github.com/carlescliment/BladeTester
    target=bundles/BladeTester
```



### Add BladeTesterBundle to your application kernel
```
    // app/AppKernel.php
    public function registerBundles()
    {
        return array(
            // ...
            new BladeTester\ChainedStubsBundle();
            // ...
        );
    }
```

### Register the BladeTesterBundle namespace
```
    // app/autoload.php
    $loader->registerNamespaces(array(
        'BladeTester'            => __DIR__.'/../vendor/bundles',
        // your other namespaces
    ));
```