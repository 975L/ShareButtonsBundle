ShareButtonsBundle
==================

ShareButtonsBundle does the following:

- Defines buttons to share web page.

[ShareButtonsBundle dedicated web page](https://975l.com/en/pages/sharebuttons-bundle).

Bundle installation
===================

Step 1: Download the Bundle
---------------------------
Use [Composer](https://getcomposer.org) to install the library
```bash
    composer require c975L/sharebuttons-bundle
```

Step 2: Enable the Bundle
-------------------------
Then, enable the bundles by adding them to the list of registered bundles in the `app/AppKernel.php` file of your project:

```php
<?php
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            // ...
            new c975L\ShareButtonsBundle\c975LShareButtonsBundle(),
        ];
    }
}
```
