<?php

require_once '../vendor/autoload.php';

$m = new \Moment\Moment('now', 'Y-m-d', 'Europe/Madrid');
var_dump($m->add('day', 41)->calendar());
var_dump($m->subtract('day',1)->calendar());
var_dump($m->fromNow());
var_dump($m->startOf('hour'));
var_dump($m->endOf('minute'));