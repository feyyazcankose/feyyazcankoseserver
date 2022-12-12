<?php 

class Helper {
    static public $web;
    static function response($status, $data) {
        $cors = "*";
        header("Access-Control-Allow-Origin: ".$cors);
        header('Content-Type: application/json; charset=utf-8');
        http_response_code($status);
        echo json_encode($data);
    }

    static function app($path,$method,$function){
        self::$web[]=[
            'path'=>$path,
            'method'=>$method,
            'function'=>$function
        ];
    }
}

?>