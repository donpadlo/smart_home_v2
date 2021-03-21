<?php

// Copyright (c) 2020-20xx by Pavel Gribov https://грибовы.рф
// Распространяется под лицензией:
// Копируйте, распространяйте, используйте, модифицируйте сохраняя оригинальные копирайты и ссылки ( GPLv3 )

//инициализируем соединение с БД
$sqln=new Tsql($pdo_driver,$pdo_basename,$pdo_server,$pdo_username,$pdo_password);

// получаем основные параметры движка
$cfg=New Tcfg($sqln);