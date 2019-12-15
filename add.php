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


     $exist= $con->query("SELECT * FROM info WHERE user ='$user'");
     $exist_results=mysqli_num_rows($exist);
      if ($exist_results)
          $success['add_data']='用户已存在，请检查后重新添加';
      else {
          $con->query("INSERT INTO info (user,name,sex,age,score,labgroup) VALUES ('$user','$name','$sex','$age','$score','$group')");
          $success['add_data']='添加成功';
     }


  }
 else
     $success['msg']='fail to connect';

  echo json_encode($success);