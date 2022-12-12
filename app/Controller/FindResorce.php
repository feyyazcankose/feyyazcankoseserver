<?php 
include '../Helper/Helper.php';

class FindResorce{
    static function index(){
            $path = dirname(__DIR__, 1).'/Python/index.py';
            $r=shell_exec("python3 ".$path.' "c language programming while loop example"');
            // var_dump($r);
            return Helper::response(200, [
                "status" => true,
                "message" => json_decode($r)
            ]);
    }
}
?>
