<?php
  $user=$_POST['user'];
  $name=$_POST['name'];
  $sex=$_POST['sex'];
  $age=$_POST['age'];
  $score=$_POST['score'];
  $group=$_POST['group'];


$success=['msg'=>'success to connect',];

$con=mysqli_connect('localhost','root','123456','info',3306);
if ($con)
{
    mysqli_query($con,'set names utf8');
    mysqli_query($con,'set character_set_result=utf8');
    mysqli_query($con,'set character_set_client=utf8');

  $result=$con->query("UPDATE info SET name='$name',sex='$sex',age='$age',score='$score',labgroup='$group' WHERE user='$user'");

   if ($result)
      $success['msg']='修改成功';

}
else
    $success['msg']='连接失败请检查网络连接';

echo json_encode($success);