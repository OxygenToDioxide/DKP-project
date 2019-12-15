<?php

$user = $_POST['user'];

$name = $_POST['name'];

$mission = $_POST['mission'];

$score = $_POST['score'];

$group = $_POST['group'];


$success = ['msg' => 'success to connect',];

$con = mysqli_connect('localhost', 'root', '123456', 'info', 3306);
if ($con) {
    mysqli_query($con, 'set names utf8');
    mysqli_query($con, 'set character_set_result=utf8');
    mysqli_query($con, 'set character_set_client=utf8');


        $con->query("INSERT INTO mission (user,name,score,labgroup,mission) VALUES ('$user','$name','$score','$group','$mission')");

        $con->query("INSERT INTO record (user,name,score,labgroup,mission,date) VALUES ('$user','$name','$score','$group','$mission',now())");

        $success['add_data'] = '添加成功';


} else
    $success['msg'] = 'fail to connect';

echo json_encode($success);