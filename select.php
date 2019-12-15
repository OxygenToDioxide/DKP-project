<?php


    $success=['msg'=>'ok','info'=>null];

    $user=$_POST['user'];


    $con=mysqli_connect('localhost','root','123456','info',3306);
  if ($con)
  {
    mysqli_query($con,'set names utf8');
    mysqli_query($con,'set character_set_result=utf8');
    mysqli_query($con,'set character_set_client=utf8');


    $result=mysqli_query($con,"SELECT * FROM info WHERE user='$user'");
    $row = mysqli_fetch_assoc($result);
    if($row) {
        $success['info'] = $row;
        $success['msg'] = "查询成功";
    }
    else
        $success['msg']="查询失败请重新检查";


  }
else
    $success['msg']="连接失败请检查网络连接";

echo json_encode($success);