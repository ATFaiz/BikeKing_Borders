<?php

include 'includes/autoload.inc.php';

$company = new Company();

$found = $company->retrieveCompanyDetails();    

if($found){
    $companyName = $company->getCompanyName();
    $users = new Users("","","","","","","","","");
    $rows = $users->listUsers();
    $record = 0;
}
else
{
    echo "Company Record missing.";
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Admin</title>
        <meta name="author" content="Ahmad Tariq Faiz">
        <meta name="description" content="Data Administration Pages"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Roboto&display=swap" rel="stylesheet"> 
        <script src="https://kit.fontawesome.com/3830352c3e.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <main>
            <h1 class="wordmark center"><?= $companyName ?></h1>
            <h1 class="admin-header">Database Administration</h1>
            <h1 class="admin-header">User Information</h1>
            <table id="table">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Email Address</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>House Number</th>
                        <th>Street</th>
                        <th>City</th>
                        <th>Post Code</th>
                        <th>Subscript</th>
                        <th>Delete</th>
                        <th>Amend</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($record < count($rows)){
                        echo '<tr>';
                        echo '  <td>'.$rows[$record]['userID'].'</td>';
                        echo '  <td>'.$rows[$record]['emailAddress'].'</td>';
                        echo '  <td>'.$rows[$record]['firstName'].'</td>';
                        echo '  <td>'.$rows[$record]['lastName'].'</td>';
                        echo '  <td>'.$rows[$record]['houseNumber'].'</td>';
                        echo '  <td>'.$rows[$record]['street'].'</td>';
                        echo '  <td>'.$rows[$record]['city'].'</td>';
                        echo '  <td>'.$rows[$record]['postCode'].'</td>';
                        if($rows[$record]['subscription'] == 0){
                            echo '  <td>False</td>';
                        }else {
                            echo '  <td>True</td>';
                        }
                        echo '  <td style="text-align: center;" class="user-delete"><i class="fas fa-trash-alt"></i></td>';
                        echo '  <td style="text-align: center;" class="user-amend"><i class="fas fa-edit"></i></td>';
                        echo '</tr>';
                        $record++;
                    }
                ?>
                </tbody>
            </table>
            <button id="exit-users" type="button" class="button admin">Return to Menu</button>
        </main>
        <script>
            const table = document.getElementById('table');
            const menu = document.getElementById('exit-users');

            menu.addEventListener("click", function(){
                window.location.href="admin.php";
            });
            
            const deleteUser = document.getElementsByClassName('user-delete');
            Array.from(deleteUser).forEach(function (element, index){
                element.addEventListener("click", function(){
                    userID = table.rows[index+1].cells[0].innerHTML;
                    firstName = table.rows[index+1].cells[2].innerHTML;
                    lastName = table.rows[index+1].cells[3].innerHTML;
                    if(window.confirm("Delete User - " + firstName + " " + lastName + " ?")){
                        window.location.href="admin-user-del.php?userid=" + userID;
                    }
                });
            });

            const editUser = document.getElementsByClassName('user-amend');
            Array.from(editUser).forEach(function (element, index){
                element.addEventListener("click", function(){
                    userID = table.rows[index+1].cells[0].innerHTML;
                    window.location.href="admin-user-edit.php?userid=" + userID;
                });
            });
        </script>
    </body>
</html>