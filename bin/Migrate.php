<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 04/02/2018
 * Time: 07:34
 */

use Migrations\Migration201802040727;

define('ROOT_DIR', dirname(__DIR__));

require ROOT_DIR . '/vendor/autoload.php';

$injector = include(ROOT_DIR . '/src/Dependencies.php');

$connection = $injector->make('Doctrine\DBAL\Connection');

$migration = new Migration201802040727($connection);
$migration->migrate();

echo 'Finished running migrations' . PHP_EOL;