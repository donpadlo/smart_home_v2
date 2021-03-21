<?php

// Copyright (c) 2020-20xx by Pavel Gribov https://грибовы.рф
// Распространяется под лицензией:
// Копируйте, распространяйте, используйте, модифицируйте сохраняя оригинальные копирайты и ссылки ( GPLv3 )


class Tcfg {
    public $dbh;
    public $sitetitle;
    public function __construct($sqln) {
        $this->dbh=$sqln->dbh;
        $this->GetMainParam();
    }
    public function GetParam($paramname) {
      $stmt = $this->dbh->prepare("SELECT value FROM config WHERE `name` = ?");
      $stmt->execute([$paramname]);
      return $stmt->fetchColumn();
    }
    public function GetMainParam() {
        $this->sitetitle=$this->GetParam("sitetitle");
    }
}    
