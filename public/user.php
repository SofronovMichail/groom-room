<?
function checkUser($conn, $login)
{
    $result = $conn->query("SELECT * FROM users WHERE `login` = '$login'");
    $user = $result->fetch_assoc();
    if (!empty($user)) {
        echo "<p>Данный логин уже используется!</p>";
        return false;
    }
}
function register($login, $pass, $role)
{
    require("./connect.php");
    $sql = "INSERT INTO users (`login`, `password`, `role`)
  VALUES ('$login', '$pass', '$role')";
    if (checkUser($conn, $login) !== false) {
        if ($conn->query($sql) === TRUE) {
            echo "<p>New record created successfully</p>";
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
// register("admin", "root", "admin");

function login($login, $password)
{
    require("./connect.php");
    $result = $conn->query("SELECT `password` FROM users WHERE `login` = '$login' LIMIT 1");
    $data = mysqli_fetch_assoc($result);
    if ($data['password'] !== $password) {
        echo "<p>Неверный логин или пароль!</p>";
    }
    else {
        echo "<p>Вход в " . $login . " выполнен!</p>";
    }
}
// login("admin", "123");
?>
