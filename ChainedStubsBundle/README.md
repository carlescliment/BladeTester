BladeTesterBundle
=================

## Installation

### Add the following lines to your  `deps` file and then run `php bin/vendors install`:

```
[BladeTesterBundle]
    git=https://github.com/carlescliment/BladeTesterBundle
    target=bundles/BladeTesterBundle
```



### Add BladeTesterBundle to your application kernel
```
    // app/AppKernel.php
    public function registerBundles()
    {
        return array(
            // ...
            new BladeTesterBundle(),
            // ...
        );
    }
```