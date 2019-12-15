<?php

$success=['msg'=>'ok'];

$score1=$_POST['score'];

$user=$_POST['user'];


$con=mysqli_connect('localhost','root','123456','info',3306);

if ($con)
{
    mysqli_query($con,'set names utf8');
    mysqli_query($con,'set character_set_result=utf8');
    mysqli_query($con,'set character_set_client=utf8');

    $result=$con->query("SELECT score FROM info WHERE user ='$user'");
    $score2=mysqli_fetch_array($result);
    $score2['score']+=$score1;
    if ($score2) {
        $con->query("UPDATE info SET score='$score2[score]' WHERE user='$user' ");
        $success['status'] = 'success';
    }

}
else
    $success['status']='fail';
echo json_encode($success);
