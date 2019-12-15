<?php


   $success=['msg'=>'ok'];


  $con=mysqli_connect('localhost','root','123456','info',3306);
     if ($con){
         mysqli_query($con,"set names utf8");
         mysqli_query($con,"set character_set_result=utf8");
         mysqli_query($con,"set character_set_client=utf8");

         $result=$con->query("SELECT user,name,sex,age,score,labgroup FROM info ORDER BY user");

         if ($result->num_rows>0) {
             $info=[];
             $user=[]; $name=[]; $sex=[]; $age=[]; $score=[]; $group=[];
             for ($i=0; $row=mysqli_fetch_assoc($result);$i++){
                 $info[$i]=$row;
             }
             for ($j=0;$j<count($info);$j++){

                 $user[$j]=$info[$j]['user'];
                 $name[$j]=$info[$j]['name'];
                 $sex[$j]=$info[$j]['sex'];
                 $age[$j]=$info[$j]['age'];
                 $score[$j]=$info[$j]['score'];
                 $group[$j]=$info[$j]['labgroup'];
           }


       }
   }

     else $success['infoCode']=0;

    $success['user']=$user; $success['name']=$name; $success['sex']=$sex; $success['age']=$age; $success['score']=$score; $success['group']=$group;

   echo json_encode($success);
