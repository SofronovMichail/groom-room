<?php

function connect_db()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "groom-room";

    $conn = new mysqli($servername, $username, $password, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function register_user($conn, $login, $password)
{
    // ищем на такого же пользователя
    $sql = "SELECT `id`, `login` FROM `users` WHERE `login`='$login' AND `password`='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return false;
    }
    else {
        $register_sql = "INSERT INTO `users` (`login`, `password`) VALUES ('$login', '$password')";
        $result = $conn->query($register_sql);
        if ($result) {
            return true;
        }
    }

    return false;
}

function login_user($conn, $login, $password)
{
    $key = "";
    $d = new DateTime();

    $sql = "SELECT `id`, `login` FROM `users` WHERE `login`='$login' AND `password`='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $key = md5(md5(md5($d->getTimestamp() . $row["id"] . $row["login"])));
        }
        session_start();
        return $key;
    }

    return false;

}

$type = $_POST["type"];
$conn = connect_db();

switch ($type) {
    case "LOGIN_USER":
        echo json_encode(login_user($conn, $_POST["login"], $_POST["password"]));
        break;
    case "REGISTER_USER":
        echo json_encode(register_user($conn, $_POST["login"], $_POST["password"]));
        break;
    default:
        break;
}