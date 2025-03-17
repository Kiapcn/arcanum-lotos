<?php
header("Content-Type: application/json");
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    if ($data["username"] === "admin" && $data["password"] === "password123") {
        $_SESSION["authenticated"] = true;
        echo json_encode(["success" => true]);
    } else {
        http_response_code(401);
        echo json_encode(["error" => "Invalid credentials"]);
    }
}