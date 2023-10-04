<?php
require_once 'Controllers/error2.php';

class App{

    function __construct(){
        //echo "<p>Nueva app</p>";
        $url = isset($_GET['url']) ? $_GET['url']: null;
        $url = rtrim($url,'/');
        $url = explode('/',$url);
        //var_dump($url);

        //cuando se ingresa sin definir controlador
        if(empty($url[0])){
            $archivoController = 'Controllers/main.php';
            require_once $archivoController;
            $controller = new Main();
            $controller->loadModel('main');
            $controller->render();
            return false;
        }

        $archivoController = 'Controllers/'.$url[0].".php";
        if(file_exists($archivoController)){
            require_once $archivoController;
            //inicializas el controlador
            $controller = new $url[0];
            $controller->loadModel($url[0]);
            //numero de elementos del arreglo
            $nparam = sizeof($url);

            if($nparam > 1){
                if($nparam > 2){
                    $param = [];
                    for($i = 2; $i<$nparam;$i++){
                        array_push($param, $url[$i]);
                    }
                    $controller->{$url[1]}($param);
                }else{
                    $controller->{$url[1]}();
                }
            }else{
                $controller->render();
            }
        }else{
            $controller = new Error2();
        }
    }
}
?>