<?php

$data = json_decode(file_get_contents(__DIR__.'/../composer.json'), true);
unset($data['require']['dflydev/psr0-resource-locator-implementation-service-provider']);
file_put_contents(__DIR__.'/composer.json', json_encode($data));
