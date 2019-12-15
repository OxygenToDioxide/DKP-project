<?php


$success=['msg'=>null,'user'=>null,'name'=>null,'score'=>null,'group'=>null];

$message=$_POST['info'];

$type=$_POST['type'];


$con=mysqli_connect('localhost','root','123456','info',3306);
if ($con)
{
    mysqli_query($con,'set names utf8');
    mysqli_query($con,'set character_set_result=utf8');
    mysqli_query($con,'set character_set_client=utf8');

    if ($type=='user')
       $result=mysqli_query($con,"SELECT * FROM info WHERE user = '$message'");
    if ($type=='name')
        $result=mysqli_query($con,"SELECT * FROM info WHERE name = '$message'");
    if ($type=='group')
        $result=mysqli_query($con,"SELECT * FROM info WHERE labgroup = '$message'ORDER BY score");
   if (mysqli_num_rows($result)>0) {
       $info = [];
       $users = [];
       $name = [];
       $group = [];
       $score = [];
       for ($i = 0; $row = mysqli_fetch_array($result); $i++) {
           $info[$i] = $row;
       }
       for ($j = 0; $j < count($info); $j++) {

               $users[$j] = $info[$j]['user'];
               $score[$j]=$info[$j]['score'];
               $name[$j] = $info[$j]['name'];
               $group[$j] = $info[$j]['labgroup'];

       }

       $success['user']=$users;
       $success['name']=$name;
       $success['score']=$score;
       $success['group']=$group;
       $success['msg']="查询成功！";

   }

    else
        $success['msg']="查询失败请重新检查";


}
else
    $success['msg']="连接失败请检查网络连接";

echo json_encode($success);