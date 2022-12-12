<?php

include '../app/Controller/FindResorce.php';
include '../app/Controller/MessageAiController.php';
include '../app/Helper/Helper.php';



Helper::app('/', "get", function () {
    return header("Location: https://feyyazcankose.com");
});

Helper::app('/find-resorce', "get", [FindResorce::class, 'index']);
Helper::app('/message-ai', "post", [MessageAiController::class, 'index']);
Helper::app('/documantation', "get", function(){
    return header("Location: https://documenter.getpostman.com/view/20551276/2s8YswRBrH");
});



$page = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER["REQUEST_METHOD"];
foreach (Helper::$web as $key => $value) {
    if ($page === $value["path"] && strtolower($method) === trim(strtolower($value["method"]))) {
        if (is_array($value["function"])) {
            if (class_exists($value["function"][0])) {
                $runMethod =(new FindResorce)->{$value["function"][1]}();
            }
        } else {
            $runMethod = $value["function"];
        }

        if (strtolower($method) === 'post') {
            $runMethod(json_decode(file_get_contents('php://input'), true));
        } else {
            $runMethod();
        }
        return;
        break;
    }
}

return Helper::response(404, [
    "message" => "page_not_found"
]);
