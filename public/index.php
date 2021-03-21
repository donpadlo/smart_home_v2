<?php

// Copyright (c) 2020-20xx by Pavel Gribov https://грибовы.рф
// Распространяется под лицензией:
// Копируйте, распространяйте, используйте, модифицируйте сохраняя оригинальные копирайты и ссылки ( GPLv3 )


define('WUO_ROOT', dirname(__FILE__));

$time_start = microtime(true); // Засекаем время начала выполнения скрипта

header('Content-Type: text/html; charset=utf-8');

require_once WUO_ROOT.'/../config.php';             // основные настройки
require_once WUO_ROOT.'/../inc/functions.php';          // основные функции
require_once WUO_ROOT.'/../vendor/autoload.php';
// загружаем классы
spl_autoload_register(function ($class_name) {
    require_once WUO_ROOT.'/../class/'.$class_name.'.php';
});


$view= ClearPath(_GET("view"));
//die($view);
if ($view!=""){  
  if ((is_file(WUO_ROOT."/../controller/view/".$view.".php")==false) and (is_file(WUO_ROOT."/../controller/client/".$view.".php")==false)) {$view="service/404";};
   // сначала загружаю "не видимую часть если есть" (подготовка view)   
    if (is_file(WUO_ROOT."/../controller/app/".$view.".php")!=false){
        require_once WUO_ROOT."/../controller/app/".$view.".php";
    };
  // а теперь - отображение
  require_once WUO_ROOT."/../controller/view/index.php";
};

$server= ClearPath(_GET("server"));
if ($server!=""){
  if (is_file(WUO_ROOT."/../controller/server/".$server.".php")==false) {
    $view="service/404";      
    require_once WUO_ROOT."/../controller/view/index.php";
  } else {
    require_once WUO_ROOT."/../controller/server/$server.php";
  };
};    

if (($view=="") and (($server==""))){
  $view="index";  
  require_once WUO_ROOT."/../controller/view/index.php";  
};