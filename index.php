<?php
    //Name: Afolabi Temidayo Timothy
    //Intern ID: SH-IT-48472
    //Stack: Web Development(Backend)
    //Program: Side Hustle Internship 3.0 
    
    include_once('./include/config.php');
    include_once('./include/session.php');
    include_once('./include/redirect.php');

    if(isset($_POST['btn_login'])){
        // passing the data's collected from user into a variable
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Preventing SQL Injection
        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);

        // Form Validation
        if(empty($username) || empty($password)){
            echo "<p style='color: red;'>All fields are required</p>";
        }
        else{
            $sql = "SELECT * FROM tblregister WHERE username = '$username'"; // check if username provided exist in database
            $query_result = mysqli_query($conn, $sql);
            $result = mysqli_num_rows($query_result);
            if($result > 0){ 
                while($row = mysqli_fetch_array($query_result)){
                    // storing the user's data fetched from the database into some variables
                    $username = $row['username'];
                    $fetched_password = $row['password'];
                    $fullname = $row['fullname'];

                    // storing those values into session
                    $_SESSION['username'] = $username;
                    $_SESSION['fullname'] = $fullname;
                    $_SESSION['password'] = $password;

                    if(password_verify($password, $fetched_password)){
                        echo "<p style='color: green;'>Login successful</p>";
                        RedirectTo('dashboard.php');
                    }
                    else{
                        echo "<p style='color: red;'>Username/Password Provided is Invalid</p>";
                    }
                }
            }else{
                    echo "<p style='color: red;'>Username/Password Provided is Invalid</p>";
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
            <h2>Login Here!</h2>
            <form action="index.php" method="POST">
                <label>Username:</label>
                <input type="text" name="username" placeholder="Username Here" />
                <br><br>
                <label>Password:</label>
                <input type="password" name="password" placeholder="Password Here" />
                <br><br>
                <button type="submit" name="btn_login">Login</button>
            </form>
            <p>Don't have an account?<a href="register.php" class="register"> Sign up</a></p>
            <footer>
                <p> &copy; 2021 Side Hustle Internship. All Rights Reserved | Design by <a href="https://www.github.com/Afolabi8120/">Afolabi Temidayo Timothy</a></p>
            </footer>
        </fieldset>
    </legend>

</body>

</html>
