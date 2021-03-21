<?php

// Copyright (c) 2020-20xx by Pavel Gribov https://грибовы.рф
// Распространяется под лицензией:
// Копируйте, распространяйте, используйте, модифицируйте сохраняя оригинальные копирайты и ссылки ( GPLv3 )


define("debug", true); // вывод на экран отладочной информации и информации об ошибках


$cfg_xml= simplexml_load_file(WUO_ROOT."/../config.xml");

$pdo_driver=$cfg_xml->pdo_driver;
$pdo_server=$cfg_xml->pdo_server;
$pdo_username=$cfg_xml->pdo_username;
$pdo_password=$cfg_xml->pdo_password;
$pdo_basename=$cfg_xml->pdo_basename;

date_default_timezone_set('Europe/Moscow'); // Временная зона по умолчанию

// Если активен режим отладки, то показываем все ошибки и предупреждения
if (debug) {
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
}