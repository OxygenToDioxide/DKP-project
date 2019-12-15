<?php
   $username=$_POST['username'];
   $password=$_POST['password'];
   $success=['msg'=>'connect success',];
   $con=mysqli_connect('localhost','root','123456','db1');
   if($con)
   {
       mysqli_query($con,"set names utf8");
       mysqli_query($con,"set character_set_result=utf8");
       mysqli_query($con,"set character_set_client=utf8");

       $result=mysqli_query($con,'SELECT id,password FROM demo ');

       if (mysqli_num_rows($result)>0)
       {
           $info=[];
           for ($i=0;$row=mysqli_fetch_assoc($result);$i++){
               $info[$i]=$row;
           }
           for ($j=0;$j<count($info);$j++) {
               if ($username == $info[$j]['id']) {
                   if ($password == $info[$j]['password']) {
                       $success['infoCode'] = 1;
                      break;
                   }
                   else

                       $success['infoCode'] = 0;
               }
           }
       }

   }
   else
       $success['infoCode']=2;


   echo json_encode($success);


