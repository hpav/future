<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 15.07.2018
 * Time: 20:25
 */
require "../Models/Comments.php";
require "../vendor/autoload.php";
require "../configs.php";

try {
    header('Content-Type: application/json');
    $result = [
        "ok" => false,
    ];


    if ($_SERVER["REQUEST_METHOD"] !== "POST"
        || !in_array($type = $_POST["type"],
            [
                "add",
                "get"
            ])) {
        throw new \Exception("Недопустимый запрос");
    }

    $comments = new \Models\Comments();

    switch ($type) {
        case "get":
            $result["comments"] = $comments->get();
            break;

        case "add":
            $name = strip_tags($_POST["name"]);
            $message = strip_tags($_POST["message"]);

            if (empty($name)) {
                throw new \Exception("Не указано имя");
            }

            if (empty($message)) {
                throw new \Exception("Не указан текст");
            }

            $result["ok"] = $comments->add($name, $message);
            break;


    }

} catch (\Exception $e) {
    $result["error"] = $e->getMessage();
}

echo json_encode($result);


