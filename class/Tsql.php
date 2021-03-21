<?php

// Copyright (c) 2020-20xx by Pavel Gribov https://грибовы.рф
// Распространяется под лицензией:
// Копируйте, распространяйте, используйте, модифицируйте сохраняя оригинальные копирайты и ссылки ( GPLv3 )

class Tsql {
    public $dbh;
    public $last_insert_id;
    public function __construct($pdo_driver,$pdo_basename,$pdo_server,$pdo_username,$pdo_password) {
        try {
            $this->dbh = new PDO("$pdo_driver:dbname=$pdo_basename;host=$pdo_server",$pdo_username , $pdo_password);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }   
}    