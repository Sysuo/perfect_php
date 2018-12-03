<?php
/**
 * Created by PhpStorm.
 * User: atsukok
 * Date: 2018/12/04
 * Time: 5:41
 */

require 'core/ClassLoader.php';

$loader = new core¥ClassLoader();
$loader->registerDir(dirname(__FILE__) . '/core');
$loader->registerDir(dirname(__FILE__) . '/core/web');
$loader->registerDir(dirname(__FILE__) . '/core/db');
$loader->registerDir(dirname(__FILE__) . '/models');
$loader->register();

