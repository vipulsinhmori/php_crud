
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'connection.php';

if (isset($_POST['submit'])) {
    
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
        header('Location: create.php');
        exit; 
    } else {
        $user_query = "INSERT INTO user (name, username, email) VALUES ('$name', '$username', '$email')";

        if (mysqli_query($conn, $user_query)) {
            $_SESSION['success'] = "New user added successfully!";
            header('Location: index.php');
            exit; 
        } else {
            $_SESSION['error'] = "Error inserting user: " . mysqli_error($conn);
            header('Location: creatuser.php');
            exit;
        }
    }
}

?>
