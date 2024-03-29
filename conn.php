<?php
  //username       password             database
                                    
 $conn = new mysqli("localhost","freemans_freemans","freeman@1234","freemans_ticket");
    if(mysqli_connect_errno()){
        printf("connect failed: %s\n", mysqli_connect_error());

        exit();
    }
 ?>
