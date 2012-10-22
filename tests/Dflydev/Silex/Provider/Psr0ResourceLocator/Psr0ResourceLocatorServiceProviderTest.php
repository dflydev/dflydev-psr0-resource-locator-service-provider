<?php

namespace Dflydev\Silex\Provider\Psr0ResourceLocator;

use Silex\Application;

/**
 * Psr0ResourceLocatorServiceProvider Test.
 *
 * @author Beau Simensen <beau@dflydev.com>
 */
class Psr0ResourceLocatorServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test no implementation specified
     *
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage No PSR-0 Resource Locator implementation specified;
     */
    public function testImplementationNotSpecified()
    {
        $app = new Application;

        $app->register(new Psr0ResourceLocatorServiceProvider);

        $app['psr0_resource_locator'];
    }

    /**
     * Invalid implementation specified
     *
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Invalid PSR-0 Resource Locator implementation specified;
     */
    public function testInvalidImplementation()
    {
        $app = new Application;

        $app['psr0_resource_locator.implementation'] = 'some.missing.service';

        $app->register(new Psr0ResourceLocatorServiceProvider);

        $app['psr0_resource_locator'];
    }

    /**
     * Test success
     */
    public function testSuccess()
    {
        $app = new Application;

        $app['psr0_resource_locator.implementation'] = 'some.existing.service';
        $app['some.existing.service'] = 'some existing service';

        $app->register(new Psr0ResourceLocatorServiceProvider);

        $this->assertEquals('some existing service', $app['psr0_resource_locator']);
    }
}
