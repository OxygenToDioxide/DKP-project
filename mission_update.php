<?php

$user=$_POST['user'];

$name=$_POST['name'];

$mission=$_POST['mission'];

$score=$_POST['score'];

$group=$_POST['group'];

$success=['msg'=>'success to connect',];

$con=mysqli_connect('localhost','root','123456','info',3306);
if ($con)
{
    mysqli_query($con,'set names utf8');
    mysqli_query($con,'set character_set_result=utf8');
    mysqli_query($con,'set character_set_client=utf8');

    $result=$con->query("UPDATE mission SET name='$name',score='$score',labgroup='$group', WHERE user='$user'AND mission='$mission'");

    if ($result)
        $success['msg']='修改成功';

}
else
    $success['msg']='连接失败请检查网络连接';

echo json_encode($success);
