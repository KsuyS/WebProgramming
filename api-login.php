<?php
session_start();
require_once "database.php";

$method = $_SERVER['REQUEST_METHOD'];
echo $method;

if ($method != "POST") {
    echo "Ожидался другой метод";
} else {
    $dataAsJson = file_get_contents("php://input");
    $dataAsArray = json_decode($dataAsJson, true);
    $conn = createDBConnection();
    login($dataAsArray, $conn);
    closeDBConnection($conn);
}

function login(array $dataAsArray, $conn): void
{
    if (isCorrect($dataAsArray, $conn)) {
        header("HTTP/1.1 200 OK");
        $_SESSION['log'] = 'user';
        $_SESSION['email'] = $dataAsArray['email'];
        $_SESSION['color'] = getRandColor();

    } else {
        header('HTTP/1.0 401 Unauthorized');
    }
}

function isCorrect(array $dataAsArray, $conn): bool
{
    $salt = 'library';
    $email = $dataAsArray['email'] ?? null;
    $password = $dataAsArray['password'] ?? null;

    $sql = "SELECT password FROM user WHERE email = '$email'";
    $conn->query($sql);
    $corPassword = $conn->query($sql);
    $statement = $conn->query($sql);
    if ($row = $statement->fetch_assoc()) {
        $corPassword = $row['password'];
        if ($corPassword == md5(md5($password) . $salt)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getRandColor() {   
    $red = mt_rand(0, 255);
    $green = mt_rand(0, 255);
    $blue = mt_rand(0, 255);

    $hex = sprintf("#%02x%02x%02x", $red, $green, $blue);  
    return $hex;
}