<?php
    
    include 'includes/autoload.inc.php';
    
    if(isset($_GET['userid'])){

        $userID = $_GET['userid'];

        $userHistory = new Userhistory();
        $userHistory->deleteHistory($userID);

        $users = new Users("","","","","","","","","");
        $users->deleteUser($userID);

        header('Location: ' . $_SERVER["HTTP_REFERER"] );

    }else {
        header('Location: ' . $_SERVER["HTTP_REFERER"] );
    }
?>