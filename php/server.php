<?php

// Starting the session
session_start();

// Declaring and hoisting the variables
$errors = [];

// Connect to the database
$db_host = "localhost";
$db_username = "";
$db_password = "";
$db_name = "db";

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    array_push($errors, "Database Connection Error");
}

// Registration
if (isset($_POST["reg_user"])) {
    // Data sanitization
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password_1 = mysqli_real_escape_string($conn, $_POST["password_1"]);
    $password_2 = mysqli_real_escape_string($conn, $_POST["password_2"]);
    $role = mysqli_real_escape_string($conn, $_POST["role"]);

    // Ensuring that the user has not left any input field blank
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($role)) {
        array_push($errors, "Role is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }

    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // If the form is error free, then register the user
    if (count($errors) == 0) {
        // Password encryption (MD5 is NOT safe for production)
        $password = md5($password_1);

        // Inserting data into table
        $query = "INSERT INTO User (Username, Password, Email, Role) 
				VALUES('$username', '$password', '$email', '$role')";

        mysqli_query($conn, $query);

        // Get UserID
        $query = "SELECT UserID FROM User WHERE Username = '$username'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $user_id = $row["UserID"];

        // Storing the session variable
        $_SESSION["user_id"] = $user_id;
        $_SESSION["username"] = $username;
        $_SESSION["role"] = $role;

        // Redirect
        header("location: ../pages/signup2.php");
    }

    // Close the database connection
    $conn->close();
}

// Registration 2
if (isset($_POST["reg_user_2"])) {
    // Data sanitization
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    $bio = mysqli_real_escape_string($conn, $_POST["bio"]);
    $portfolio = mysqli_real_escape_string($conn, $_POST["portfolio"]);
    $website = mysqli_real_escape_string($conn, $_POST["website"]);

    // Ensuring that the user has not left any input field blank
    if (empty($name)) {
        array_push($errors, "Full name is required");
    }

    // If the form is error free, then register the user
    if (count($errors) == 0) {
        // Inserting data into table
        $user_id = $_SESSION["user_id"];
        $role = $_SESSION["role"];

        if ($role == "Customer") {
            $query = "INSERT INTO Customer (Name, Address, Payment, UserID) 
              VALUES('$name', '$address', UUID(), '$user_id')";
            mysqli_query($conn, $query);
        } elseif ($role == "Artist") {
            $query = "INSERT INTO Artist (Name, Bio, PortfolioURL, UserID) 
              VALUES('$name', '$bio', '$portfolio', '$user_id')";
            mysqli_query($conn, $query);
        } elseif ($role == "Supplier") {
            $query = "INSERT INTO Supplier (Name, Address, WebsiteURL, UserID) 
              VALUES('$name', '$address', '$website', '$user_id')";
            mysqli_query($conn, $query);
        }

        // Storing the session variable
        $_SESSION["logged_in"] = true;

        // Redirect
        header("location: ../index.php");
    }

    // Close the database connection
    $conn->close();
}

// User login
if (isset($_POST["login_user"])) {
    // Data sanitization
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $role = mysqli_real_escape_string($conn, $_POST["role"]);

    // Error message if the input field is left blank
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if (empty($role)) {
        array_push($errors, "Role is required");
    }

    // Checking for the errors
    if (count($errors) == 0) {
        // Password matching
        $password = md5($password);

        $query = "SELECT * FROM User WHERE Username = '$username' AND Password = '$password' AND Role = '$role'";
        $results = mysqli_query($conn, $query);

        if (mysqli_num_rows($results) == 1) {
            // Get UserID
            $query = "SELECT UserID FROM User WHERE Username = '$username'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $user_id = $row["UserID"];

            // Storing the session variable
            $_SESSION["logged_in"] = true;
            $_SESSION["username"] = $username;
            $_SESSION["user_id"] = $user_id;
            $_SESSION["role"] = $role;

            // Redirect
            header("location: ../index.php");
        } else {
            // If the username and password doesn't match
            array_push($errors, "Username or password incorrect");
        }
    }

    // Close the database connection
    $conn->close();
}

// User logout
if (isset($_POST["logout"])) {
    // Clear the session
    session_unset();
    session_destroy();

    // Redirect to the login page
    header("Location: ../index.php");

    // Close the database connection
    $conn->close();
}
