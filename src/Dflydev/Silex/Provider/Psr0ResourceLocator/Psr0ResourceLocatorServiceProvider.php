<?php

/*
 * This file is a part of dflydev/psr0-resource-locator-service-provider.
 *
 * (c) Dragonfly Development Inc.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dflydev\Silex\Provider\Psr0ResourceLocator;

use Silex\Application;
use Silex\ServiceProviderInterface;

/**
 * PSR-0 Resource Locator Silex Service Provider.
 *
 * @author Beau Simensen <beau@dflydev.com>
 */
class Psr0ResourceLocatorServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function boot(Application $app)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function register(Application $app)
    {
        $app['psr0_resource_locator'] = $app->share(function($app) {
            if (empty($app['psr0_resource_locator.implementation'])) {
                throw new \InvalidArgumentException("No PSR-0 Resource Locator implementation specified; set the 'psr0_resource_locator.implementation' parameter.");
            }

            $implementation = $app['psr0_resource_locator.implementation'];

            if (empty($app[$implementation])) {
                throw new \InvalidArgumentException("Invalid PSR-0 Resource Locator implementation specified; did you forget to install the service provider for the '$implementation' service?");
            }

            return $app[$implementation];
        });
    }
}
