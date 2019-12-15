<?php

    $success=['msg'=>'ok'];

    $user=$_POST['user'];

    $con=mysqli_connect('localhost','root','123456','info',3306);

    if ($con)
    {
     mysqli_query($con,'set names utf8');
     mysqli_query($con,'set character_set_result=utf8');
     mysqli_query($con,'set character_set_client=utf8');

       $con->query("DELETE FROM info WHERE user='$user' ");

        $success['status']='success';


    }
    else
        $success['status']='fail';
    echo json_encode($success);

