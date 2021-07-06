<?php
	//Name: Afolabi Temidayo Timothy
    //Intern ID: SH-IT-48472
    //Stack: Web Development(Backend)
    //Program: Side Hustle Internship 3.0 
    
	include_once('./include/config.php');
    include_once('./include/session.php');
    include_once('./include/redirect.php');

    session_destroy();
    RedirectTo('index.php');

?>