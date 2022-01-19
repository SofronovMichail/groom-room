<?
function createApplication($idUser, $name, $imgBefore, $imgAfter, $category, $status)
{
    require("./connect.php");
    $date = date("d/m/Y");
    $sql = "INSERT INTO applications (`id-user`, `name`, `img-before`, `img-after`, `date`, `category`, `status`)
  VALUES ('$idUser', '$name', '$imgBefore', '$imgAfter', '$date', '$category', '$status')";
    if ($conn->query($sql) === TRUE) {
        echo "<p>New application created successfully</p>";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
// createApplication(1, "Dog", "img/dog.img", "img/image1.img", "Стрижка", "В обработке");

function getAllApplications()
{
    require("./connect.php");
    $result = mysqli_query($conn, "SELECT * FROM applications");
    $applications = mysqli_fetch_assoc($result);
    echo $applications['name'] . ' ' .
        $applications['img-before'] . ' ' .
        $applications['img-after'] . ' ' .
        $applications['date'] . ' ' .
        $applications['category'] . ' ' .
        $applications['status'] .
        "<br />";
    while ($row = mysqli_fetch_array($result)) 
{
        echo $row['name'] . ' ' .
            $row['img-before'] . ' ' .
            $row['img-after'] . ' ' .
            $row['date'] . ' ' .
            $row['category'] . ' ' .
            $row['status'] .
            "<br />";
    }


}
getAllApplications();

function getAllApplicationsInID($idUser)
{
    require("./connect.php");
    $result = mysqli_query($conn, "SELECT * FROM applications WHERE `id-user` = $idUser");
    $applications = mysqli_fetch_assoc($result);
    echo $applications['name'] . ' ' .
        $applications['img-before'] . ' ' .
        $applications['img-after'] . ' ' .
        $applications['date'] . ' ' .
        $applications['category'] . ' ' .
        $applications['status'] .
        "<br />";
    while ($row = mysqli_fetch_array($result)) 
{
        echo $row['name'] . ' ' .
            $row['img-before'] . ' ' .
            $row['img-after'] . ' ' .
            $row['date'] . ' ' .
            $row['category'] . ' ' .
            $row['status'] .
            "<br />";
    }


}
// getAllApplicationsInID(2);

function deleteApplication($idApplication)
{
    require("./connect.php");
    $result = mysqli_query($conn, "SELECT * FROM applications WHERE `id-app` = $idApplication");
    $countRows = mysqli_fetch_row($result)[0];
    if ($countRows) {
        $sql = "DELETE FROM applications WHERE `id-app` = $idApplication";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Application where id = {$idApplication} deleteded successfully</p>";
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    else {
        echo "<p>Application where id = {$idApplication} is not found</p>";
    }

}
// deleteApplication(2);

function changeStatus($idApplication, $newStatus)
{
    require("./connect.php");
    $sql = "UPDATE `applications` SET `status` = '$newStatus' WHERE `applications`.`id-app` = $idApplication;";
    if ($conn->query($sql) === TRUE) {
        echo "<p>New application status updated successfully</p>";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
// changeStatus(2, "Выполнено")
?>