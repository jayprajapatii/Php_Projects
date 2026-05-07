<?php 

require('../admin/inc/db_config.php');
require('../admin/inc/essentials.php');



if(isset($_POST['register']))
{
    $data = filteration($_POST);

    // match password and confirm password field

    if($data['pass'] != $data['cpass']){
        echo 'pass_mismatch';
        exit;
    }

    // check user exists or not

  /* $u_exist = select("SELECT * FROM `user_cred` WHERE `email`=? OR `phonenum`=? LIMIT 1",[$data['email'],$data['phonenum']],"ss");

    if(mysqli_num_rows($u_exist)!=0){
        $u_exist_fetch = mysqli_fetch_assoc($u_exist);
        echo ($u_exist_fetch['email'] == $data['email']) ? 'email_already' : 'phone_already';
        exit;
    } */

     // upload user image to server
        
       $img = uploadUserImage($_FILES['profile']);

       if($img == 'inv_img'){
        echo 'inv_img';
        exit;
       }
       else if($img == 'upd_failed'){
        echo 'upd_failed';
        exit;
       }

 



     
       // send confirmation link to user's email


        //$token = bin2hex(random_bytes(16));
        $enc_pass = password_hash($data['pass'],PASSWORD_BCRYPT);

        $query = "INSERT INTO `user_cred`(`name`, `email`, `address`, `phonenum`, `pincode`, `dob`, `profile`, `password`) VALUES (?,?,?,?,?,?,?,?)";
        $values = [$data['name'],$data['email'],$data['address'],$data['phonenum'],$data['pincode'],$data['dob'],$img,$enc_pass];

        if(insert($query,$values,'ssssssss')){
            echo 1;
        }
        else{
            echo 'ins_failed';
        }

}         
 
if(isset($_POST['login']))
{
    $data = filteration($_POST);

    
   $u_exist = select("SELECT * FROM `user_cred` WHERE `email`=? OR `phonenum`=? LIMIT 1",[$data['email_mob'],$data['email_mob']],"ss");

   if(mysqli_num_rows($u_exist)==0){
         echo 'inv_email_mob';
         
   } 
    else{
       $u_fetch = mysqli_fetch_assoc($u_exist);
        if($u_fetch['status']==0){
            echo 'inactive';
            exit;
        }
        if(!password_verify($data['pass'],$u_fetch['password'])){
            echo 'invalid_pass';
        }
        else{
            session_start();
            $_SESSION['login'] = true;
            $_SESSION['uId'] = $u_fetch['id'];
            $_SESSION['uName'] = $u_fetch['name'];
            $_SESSION['uPic'] = $u_fetch['profile'];
            $_SESSION['uPhone'] = $u_fetch['phonenum'];
            echo 1;
        }
    }
}


?>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
  require 'PHPMailer/src/Exception.php'; 
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';
  session_start();
  if(isset($_POST['register']))
  { 
     $name = $_POST['name'];
     $email = $_POST['email'];
     $phone = $_POST['phonenum'];
     $date = date("d-m-Y",strtotime($data['datentime']));
	  
	  $mail =new PHPMailer(true); 
	  $mail->SMTPDebug=SMTP::DEBUG_SERVER;
	  $mail->isSMTP();
	  $mail->Host='smtp.gmail.com';
	  $mail->SMTPAuth=true;
	  $mail->Username='iweb0089@gmail.com'; //your email 
	  $mail->Password='poolksfrcuwbndfv';//your app key
	  $mail->SMTPSecure=PHPMailer::ENCRYPTION_SMTPS;
	  $mail->Port=465;
	  $mail->setFrom('iweb0089@gmail.com');//your email 
	 // $otp=rand(100000,999999);
	  
	  
	  $mail->addAddress($_POST['email']);
	  //$mail->addAttachment($file_name,'parth/image');
	  $mail->isHTML(true);
	  $mail->Subject='Welcome to The Grand Horizon Hotel - Registration Successfull!';
	 // $mail->Body="OTP IS->".$otp;
	  $mail->Body="<h4> Dear , $name </h4> <br> Thank you for registering with The Grand Horizon Hotel! <br> Your account has been successfully created, and you can now log in to manage your bookings, check availability, and enjoy exclusive offers. <br><br> <h3> Here are your registration details: </h3> <br> Name : $name <br> Email : $email <br> Phone no : $phone <br> Registration Date : $date <br><br> if you have any questions or need help, feel free to reach out to our team. <br> Support phone no : 7046705720 <br><br> WE look forward to hosting you! <br> Warm regards, <br> The Grand Horizon Hotel";
	  echo "<script>alert('send successfully');</script>";
	  echo "send successfully";
	  //$_SESSION['otp']=$otp;
	 if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else
	{
	// return "success";
	 
	}
	
  }
?>