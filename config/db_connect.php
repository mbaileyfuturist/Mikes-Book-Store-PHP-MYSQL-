<?php 
    //Connect to database.
    $conn  = mysqli_connect('localhost', 'Micheal', '', 'MikesBookStore');

   //Check Connection.
   if(!$conn){
       echo "Connection Error". mysqli_connect_error();
   }

?>