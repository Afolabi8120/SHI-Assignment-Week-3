<?php
    //Name: Afolabi Temidayo Timothy
    //Intern ID: SH-IT-48472
    //Stack: Web Development(Backend)
    //Program: Side Hustle Internship 3.0 
    
    include_once('./include/config.php');
    include_once('./include/session.php');
    include_once('./include/redirect.php');

    if(isset($_POST['btn_register'])){
        // passing the data's collected from user into a variable
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $password = $_POST['password'];

        // Preventing SQL Injection
        $username = mysqli_real_escape_string($conn, $username);
        $fullname = mysqli_real_escape_string($conn, $fullname);
        $password = mysqli_real_escape_string($conn, $password);

        // Form Validation
        if(empty($username) || empty($fullname) || empty($password)){
            echo "<p style='color: red;'>All fields are required</p>";
        }
        elseif(!preg_match("/^[a-z A-Z]*$/", $fullname)){ // Using regular expression for the name provided
            echo "<p style='color: red;'>Only alphabets allowed for the fullname field</p>";
        }
        else{
            $sql = "SELECT * FROM tblregister WHERE username = '$username'"; // check if username already exist
            $query_result = mysqli_query($conn, $sql);
            $result = mysqli_num_rows($query_result);
            if($result > 0){ 
                echo "<p style='color: red;'>Username is already taken</p>";
            }else{
                $pass = password_hash($password, PASSWORD_DEFAULT); // hashing the password provided by user

                $sql = "INSERT INTO tblregister (username,fullname,password) VALUES('$username','$fullname','$pass')";
                $query_result = mysqli_query($conn, $sql);

                if($query_result){
                    echo "<p style='color: green;'>Account has been created successfully</p>";
                }
                else{
                    echo "<p style='color: red;'>Failed to create account</p>";
                }
            }

        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>TODO List</title>
    <!-- meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>


<body>
    <legend>
        <fieldset>
            <h2>Register!</h2>
            <form action="register.php" method="POST">
                    <label>Username:</label>
                    <input type="text" name="username" placeholder="Username Here" />
                    <br><br>
                    <label>Fullname:</label>
                    <input type="text" name="fullname" placeholder="Fullname Here" />
                    <br><br>
                    <label>Password:</label>
                    <input type="password" name="password" placeholder="Password Here" />
                    <br><br>
                <button type="submit" name="btn_register">Submit</button>
            </form>
            <p>Already have an account?<a href="index.php">Login</a></p>
            <footer>
                <p> &copy; 2021 Side Hustle Internship. All Rights Reserved | Design by <a href="https://www.github.com/Afolabi8120/" target="_blank">Afolabi Temidayo Timothy</a></p>
            </footer>
        </fieldset>
    </legend>

</body>

</html>
