<?php

require_once '../vendor/autoload.php';

$m = new \Moment\Moment('now','Y');
var_dump($m->calendar()->add('day',41));
var_dump($m->format('Y-m-d h:m:s'));