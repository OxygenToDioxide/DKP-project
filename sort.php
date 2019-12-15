<?php
   $msg=$_POST['msg'];

   $success=['msg'=>'success to connect',];

$con=mysqli_connect('localhost','root','123456','info',3306);
if ($con) {

    mysqli_query($con, 'set names utf8');
    mysqli_query($con, 'set character_set_result=utf8');
    mysqli_query($con, 'set character_set_client=utf8');
    if ($msg=='user') {
        $result = $con->query("SELECT user,name,score,labgroup FROM info ORDER BY user ");
    }
    if ($msg=='name'){
        $result = $con->query("SELECT user,name,score,labgroup FROM info ORDER BY name ");
    }
    if ($msg=='score'){
        $result = $con->query("SELECT user,name,score,labgroup FROM info ORDER BY score ");
    }
    if ($msg=='labgroup'){
        $result = $con->query("SELECT user,name,score,labgroup FROM info ORDER BY labgroup ");
    }

    if ($msg=='软件组'||$msg=='硬件组'||$msg=='文案组'|| $msg=='设计组'){
        $result = $con->query("SELECT user,name,score,labgroup FROM info WHERE labgroup='$msg'");
    }



    if ($result->num_rows > 0) {
        $success['infocode']=1;
        $info = [];
        $user = [];
        $name = [];
        $score = [];
        $group = [];
        for ($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
            $info[$i] = $row;
        }
        for ($j = 0; $j < count($info); $j++) {
            $user[$j] = $info[$j]['user'];
            $name[$j] = $info[$j]['name'];
            $score[$j] = $info[$j]['score'];
            $group[$j] = $info[$j]['labgroup'];
        }
    }
}
else
   {
       $success['msg']='连接失败请检查网络连接';
       $success['infocode']=0;
   }

   $success['user']=$user; $success['name']=$name; $success['score']=$score; $success['group']=$group;

echo json_encode($success);