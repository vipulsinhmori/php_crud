
<?php
include 'connection.php';

$id = $_GET['id'];
if (!is_numeric($id)) {
    die("Invalid ID parameter");
}
$id = intval($id);
$sql = " DELETE FROM user WHERE id = $id";
$result = mysqli_query($conn, $sql);
if ($result) {
    header('Location: http://localhost/demo/index.php');
    exit;
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
