<?php


/**
 * [
 *  id => [name, age]
 * ]
 * 
 * $_SESSION["users"]["id"] = [
 *  "name" => "john"
 *  "age" => 12
 * ]
 */
session_start();

$id = $_GET["id"] ?? null;
// $_GET["id"] ? $_GET["id"] : null;

$method = $_SERVER['REQUEST_METHOD'];

$response = [];

switch ($method) {
    case "GET":
        if ($id == null) {
            $response = $_SESSION["users"] ?? [];
            echo json_encode($response);
        } else {

            if (isset($_SESSION["users"][$id])) {
                $response = $_SESSION["users"][$id];
                echo json_encode($response);
            } else {
                header('HTTP/1.1 404 Not Found');
            }
        }

        break;
    case "POST":

        $input = file_get_contents('php://input');
        $data  = json_decode($input, true);

        $storingId = $data["id"];
        $name = $data["name"];
        $age = $data["age"];

        $_SESSION["users"][$storingId] = ["name" => $name, "age" => $age];

        $response = $_SESSION["users"][$id];
        echo json_encode($response);

        break;
    case "PUT":

        $input = file_get_contents('php://input');
        $data  = json_decode($input, true);

        $name = $data["name"];
        $age = $data["age"];

        $_SESSION["users"][$id] = ["name" => $name, "age" => $age];

        $response = $_SESSION["users"][$id];
        echo json_encode($response);

        break;
    case "PATCH":

        $input = file_get_contents('php://input');
        $data  = json_decode($input, true);

        if (isset($data["name"])) {
            $_SESSION["users"][$id]["name"] = $data["name"];
        }

        if (isset($data["age"])) {
            $_SESSION["users"][$id]["age"] = $data["age"];
        }

        $response = $_SESSION["users"][$id];
        echo json_encode($response);

        break;

    case "DELETE":
        unset($_SESSION["users"][$id]);

        break;
    default:
        header('HTTP/1.1 405 Method Not Allowed');
}


header('Content-Type: application/json');
