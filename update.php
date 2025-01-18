


<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'connection.php';    

if (isset($_POST['submit'])) {
   $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
   
    $validation = [];

    if (empty($name)) {
        $validation['name'] = "Name is required.";
    }
    if (empty($username)) {
        $validation['username'] = "Username is required.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $validation['email'] = "Please enter a valid email address.";
    }

    if (count($validation) > 0) {
        $_SESSION['validation'] = $validation;
        header('Location: edit.php?id=' . $id);
        exit;
    } else {
        $sql = "UPDATE user SET name = '$name', username = '$username', email = '$email' WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
         $_SESSION['success'] = " user update successfully!";
            header('Location: index.php');
            exit;
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }

    $conn->close();
}
?>
