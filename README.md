PSR-0 Resource Locator Service Provider
=======================================

Provides a PRS-0 Resource Locator as a service to Silex applications.


Requirements
------------

 * PHP 5.3+
 * A PSR-0 Resource Locator Implementation
    * Composer — [dflydev/psr0-resource-locator-composer][1]

Installation
------------

Through [Composer](http://getcomposer.org)


Usage
-----

The following is an example using the Composer PSR-0 Resource
Locator implementation ([dflydev/psr0-resource-locator-composer][1]):

```php
<?php

use Dflydev\Silex\Provider\Psr0ResourceLocator\Psr0ResourceLocatorServiceProvider;
use Dflydev\Silex\Provider\Psr0ResourceLocator\Composer\ComposerResourceLocatorServiceProvider;
use Silex\Application;

$app = new Application;

$app->register(new Psr0ResourceLocatorServiceProvider);
$app->register(new ComposerResourceLocatorServiceProvider);

// Search all PSR-0 namespaces registered by Composer
// to find the first directory found looking like:
// "/Vendor/Project/Resources/mappings"
$mappingDirectory = $app['psr0_resource_locator']->findFirstDirectory(
    'Vendor\Project\Resources\mappings'
);

// Search all PSR-0 namespaces registered by Composer
// to find all templates directories looking like:
// "/Vendor/Project/Resources/templates"
$templateDirs = $app['psr0_resource_locator']->findDirectories(
    'Vendor\Project\Resources\templates',
);
```

Configuration
-------------

### Parameters

 * **psr0_resource_locator.implementation**:
   String containing the name of the service that implements the PSR-0
   Resource locator interface.

   This should probably be set by the implementation in its own
   Service Provider.

### Services

 * **psr0_resource_locator**:
   PSR-0 Resource Locator, instance `Dflydev\Psr0ResourceLocator\Psr0ResourceLocatorInterface`.


License
-------

MIT, see LICENSE.


Community
---------

If you have questions or want to help out, join us in the
[#dflydev][#dflydev] or [#silex-php][#silex-php] channels on
irc.freenode.net.



[1]: https://github.com/dflydev/dflydev-psr0-resource-locator-composer

[#dflydev]: irc://irc.freenode.net/#dflydev
[#silex-php]: irc://irc.freenode.net/#silex-php


