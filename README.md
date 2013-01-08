Moment
=============

This is the PHP implementation of Moment.js (http://www.momentjs.com) using phpspec2

P.S. This is a sample project.


Requirements
------------
For running specs you need to install timecomp php extension which can be found here: https://github.com/hnw/php-timecop

Installation
------------

1. curl -s https://getcomposer.org/installer | php
2. php composer.phar install --dev

Running tests
------------
After installing composer and it's dependencies you should run from a root folder:
 1. bin/phpspec run
 2. bin/phpunit tests


Current Status
--------------
For now it's just return DateInterval object.
