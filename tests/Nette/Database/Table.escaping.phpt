<?php

/**
 * Test: Nette\Database\Table\Selection: escaping.
 *
 * @author     Patrik Sima
 * @package    Nette\Database
 * @dataProvider? databases.ini  mysql
 */

$query = 'mysql';
require __DIR__ . '/connect.inc.php'; // create $connection

Nette\Database\Helpers::loadFromFile($connection, __DIR__ . "/mysql-nette_test3.sql");

$authorSelection = $connection->table('author')->select("DATE_FORMAT(datetime,'%b %d %Y %h:%i %p')")->getSql();

Assert::same( array(
	"SELECT DATE_FORMAT(`datetime`,'%b %d %Y %h:%i %p') FROM `author`"
), $authorSelection);