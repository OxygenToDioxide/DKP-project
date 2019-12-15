<?php


$success=['msg'=>'ok',];

$user=$_POST['user'];


$con=mysqli_connect('localhost','root','123456','info',3306);
if ($con)
{
    mysqli_query($con,'set names utf8');
    mysqli_query($con,'set character_set_result=utf8');
    mysqli_query($con,'set character_set_client=utf8');


    $result=mysqli_query($con,"SELECT * FROM record WHERE user='$user'");

    if (mysqli_num_rows($result)>0) {
        $info = [];
        $users=[];
        $name=[];
        $mission=[];
        $score=[];
        $group=[];
        $date=[];
        for ($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
            $info[$i] = $row;
        }
        for ($j=0;$j<count($info);$j++){
            $users[$j]=$info[$j]['user'];
            $name[$j]=$info[$j]['name'];
            $mission[$j]=$info[$j]['mission'];
            $score[$j]=$info[$j]['score'];
            $group[$j]=$info[$j]['labgroup'];
            $date[$j]=$info[$j]['date'];
        }

        $success['msg'] = "查询成功";


        $success['user']=$users;
        $success['name']=$name;
        $success['score']=$score;
        $success['group']=$group;
        $success['mission']=$mission;
        $success['date']=$date;

    }
    else   $success['msg'] = "查询失败请重新检查";

}
else
    $success['msg']="连接失败请检查网络连接";

echo json_encode($success);
