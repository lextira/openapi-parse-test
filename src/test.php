<?php

require __DIR__.'/../vendor/autoload.php';

$timer = new \Symfony\Component\Stopwatch\Stopwatch();

$event = $timer->start('read');

$openapi = \cebe\openapi\Reader::readFromYamlFile('https://docs.lexgate.ch/api/v1/index.yaml');

echo "Read took {$event->getDuration()} milliseconds...\n\n";

$parsed = json_encode($openapi->getSerializableData());

echo sprintf("Parsed file is %s characters long.\n\n", mb_strlen($parsed));