<?php
    //Name: Afolabi Temidayo Timothy
    //Intern ID: SH-IT-48472
    //Stack: Web Development(Backend)
    //Program: Side Hustle Internship 3.0 

    include_once('./include/config.php');
    include_once('./include/session.php');
    include_once('./include/redirect.php');

    if(!isset($_SESSION['username'])){
        RedirectTo('index.php');
    }else{
        if(isset($_POST['btn_add'])){
            // passing the data's collected from user into a variable
            $title = $_POST['title'];
           
           // Preventing SQL Injection
            $title = mysqli_real_escape_string($conn, $title);

            // Form Validation
            if(empty($title)){
                echo "<p style='color: red;'>Please enter a valid title</p>";
            }
            elseif(!preg_match("/^[a-z A-Z]*$/", $title)){ // Using regular expression for the title provided
                echo "<p style='color: red;'>Only alphabets allowed for the title field</p>";
            }
            else{
                $sql = "SELECT * FROM tbltodo WHERE title = '$title' AND username = '{$_SESSION['username']}'"; // check if title already exist
                $query_result = mysqli_query($conn, $sql);
                $result = mysqli_num_rows($query_result);
                if($result > 0){ 
                    echo "<p style='color: red;'>Title has already been added already</p>";
                }else{
                    $sql = "INSERT INTO tbltodo (title,username) VALUES('$title','{$_SESSION['username']}')";
                    $query_result = mysqli_query($conn, $sql);

                    if($query_result){
                        echo "<p style='color: green;'>Todo has been added successfully</p>";
                    }
                    else{
                        echo "<p style='color: red;'>Failed to add todo</p>";
                    }
                }

            }
        }
        elseif(isset($_POST['btn_remove'])){
            // passing the data's collected from user into a variable
            $id = $_POST['title_id'];

            $sql = "DELETE FROM tbltodo WHERE id = '$id' AND username = '{$_SESSION['username']}' ";
            $query_result = mysqli_query($conn, $sql);

            if($query_result){
                echo "<p style='color: green;'>Todo has been removed successfully</p>";
            }
            else{
                echo "<p style='color: red;'>Failed to remove todo</p>";
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
    <h4>Welcome, <?php echo $_SESSION['username']; ?></h4>
    <ul>
        <li><a href="dashboard.php">Home</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <hr>

    <legend>
        <fieldset>
            <h2>To-Do List</h2>
            <form action="dashboard.php" method="POST">
                <label>Title:</label><br>
                <input type="text" name="title" placeholder="Add new todo" />
                <button type="submit" name="btn_add">Add</button>
            </form>
            <br>
            <table border="1">
                <caption>Things to do</caption>
                <thead>
                    <th>S/N</th>
                    <th>Task Title</th>
                    <th>Action</th>
                </thead>
                <?php
                    $i = 0;
                    $sql = "SELECT * FROM tbltodo WHERE username = '{$_SESSION['username']}' ORDER BY title ASC";
                    $query_result = mysqli_query($conn, $sql);
                    $result = mysqli_num_rows($query_result);
                    if($result > 0){
                        while ($row = mysqli_fetch_array($query_result)) {
                            $i++;
                ?>
                <tbody>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td>
                        <form action="dashboard.php" method="POST">
                            <input type="hidden" name="title_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="btn_remove">Remove</button>
                        </form>
                    </td>
                </tbody>
                <?php
                       }
                    }
                ?>
            </table>
        </fieldset>
        <footer>
            <p> &copy; 2021 Side Hustle Internship. All Rights Reserved | Design by <a href="https://www.github.com/Afolabi8120/" target="_blank">Afolabi Temidayo Timothy</a></p>
        </footer>
    </legend>

</body>

</html>
