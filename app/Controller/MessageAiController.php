<?php 
include '../Helper/Helper.php';

class MessageAiController{
    static function index(){
            $path = dirname(__DIR__, 1).'/Python/index.py';
            $r=shell_exec("python3 ".$path);
            return json_decode($r);
    }
}
?>
