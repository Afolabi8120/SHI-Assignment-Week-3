<?php
	//Name: Afolabi Temidayo Timothy
    //Intern ID: SH-IT-48472
    //Stack: Web Development(Backend)
    //Program: Side Hustle Internship 3.0 

	$host = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'todo_db';

	$conn = mysqli_connect($host, $username, $password, $database);

	if(!$conn){
		echo "Failed to Connect";
	}

?>