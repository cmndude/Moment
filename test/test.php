<?php

require_once '../vendor/autoload.php';

$m = new \Moment\Moment();
var_dump($m->calendar()->add('day',41));
var_dump($m->format('Y-m-d h:m:s'));
$m->clear();
var_dump($m->calendar()->subtract('day',1));
var_dump($m->fromNow());
var_dump($m->startOf('hour'));