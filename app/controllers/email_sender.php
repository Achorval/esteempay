<?php
echo "Hello1";
$curl = curl_init();

$api_key = "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";

if($email_type == "verification_code"):

$email = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><title>Untitled Document</title><style type='text/css'>@media screen and (max-device-width: 480px) and (orientation: portrait){.col-1{width:80%;padding:10px}}@media screen and (max-device-width: 640px) and (orientation: landscape){.col-1{width:80%;padding:10px}}@media screen and (max-device-width: 640px){.col-1{width:80%;padding:10px}}@media screen and (max-device-width: 960px){.col-1{width:80%;padding:10px}}.bg-light{background-color:#f8f9fa!important}.auto{margin-left:auto;margin-right:auto}.container{max-width:960px;margin-left:auto;margin-right:auto}.row{width:100%;display:block;padding:10px}.bg-white{background:#FFF}.border{border:1px solid #F7F7F7}.text-center{text-align:center}</style></head><body class='bg-light'><div class='container bg-light '><div class='row '><div class='col-1 bg-white auto'><h4 class='text-center '>You have signed up successfully</h4><p class='text-center '>Your registration was successfull but we just need to verify that we got your email right.</p><p class='text-center '>Click the link below to verify your email.</p><p class='text-center '><a href='https://yfafrankmek.ng/portal/verify_email.php?code={$code}'>Verify your email</a></p><p class='text-center '>If you can't click the link, kindly copy it below and paste in your browser.</p><p class='text-center '>https://yfafrankmek.ng/portal/verify_email.php?code={$code}</p><p class='text-center '>This verification link is only valid for 24 hours.</p><p class='text-center '>For any enquiry or further question, you can send us an email to info@yfafrankmek.ng</p></div></div></div></body></html>";

$data = array("personalizations"=>array(array("to"=>array(array("email"=>"$to","name"=>"")))),"subject"=>"Activate your Account","from"=>array("email"=>"no-reply@yfafrankmek.ng","name"=>"FRANKMEK GLOBAL - YFA"),"content"=>array(array("type"=>"text/html","value"=>"$email")));

endif;

if($email_type == "registration_email"):

$email = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><title>Untitled Document</title><style type='text/css'>@media screen and (max-device-width: 480px) and (orientation: portrait){.col-1{width:80%;padding:10px}}@media screen and (max-device-width: 640px) and (orientation: landscape){.col-1{width:80%;padding:10px}}@media screen and (max-device-width: 640px){.col-1{width:80%;padding:10px}}@media screen and (max-device-width: 960px){.col-1{width:80%;padding:10px}}.bg-light{background-color:#f8f9fa!important}.auto{margin-left:auto;margin-right:auto}.container{max-width:960px;margin-left:auto;margin-right:auto}.row{width:100%;display:block;padding:10px}.bg-white{background:#FFF}.border{border:1px solid #F7F7F7}.text-center{text-align:center}</style></head><body class='bg-light'><div class='container bg-light '><div class='row '><div class='col-1 bg-white auto'><h4 class='text-center '>You have signed up successfully</h4><p class='text-center '>Your registration was successfull but we just need to verify that we got your email right.</p><p class='text-center '>Click the link below to verify your email.</p><p class='text-center '><a href='https://yfafrankmek.ng/portal/verify_email.php?code={$code}'>Verify your email</a></p><p class='text-center '>If you can't click the link, kindly copy it below and paste in your browser.</p><p class='text-center '>https://yfafrankmek.ng/portal/verify_email.php?code={$code}</p><p class='text-center '>This verification link is only valid for 24 hours.</p><p class='text-center '>For any enquiry or further question, you can send us an email to info@yfafrankmek.ng</p></div></div></div></body></html>";

$data = array("personalizations"=>array(array("to"=>array(array("email"=>"$to","name"=>"")))),"subject"=>"Activate Your Account","from"=>array("email"=>"no-reply@yfafrankmek.ng","name"=>"FRANKMEK GLOBAL - YFA"),"content"=>array(array("type"=>"text/html","value"=>"$email")));

endif;

if($email_type=="verification_email"):

$email = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><title>Untitled Document</title><style type='text/css'>@media screen and (max-device-width: 480px) and (orientation: portrait){.col-1{width:80%;padding:10px}}@media screen and (max-device-width: 640px) and (orientation: landscape){.col-1{width:80%;padding:10px}}@media screen and (max-device-width: 640px){.col-1{width:80%;padding:10px}}@media screen and (max-device-width: 960px){.col-1{width:80%;padding:10px}}.bg-light{background-color:#f8f9fa!important}.auto{margin-left:auto;margin-right:auto}.container{max-width:960px;margin-left:auto;margin-right:auto}.row{width:100%;display:block;padding:10px}.bg-white{background:#FFF}.border{border:1px solid #F7F7F7}.text-center{text-align:center}</style></head><body class='bg-light'><div class='container bg-light '><div class='row '><div class='col-1 bg-white auto'><h4 class='text-center '>You have signed up successfully</h4><p class='text-center '>Your registration was successfull but we just need to verify that we got your email right.</p><p class='text-center '>Click the link below to verify your email.</p><p class='text-center '><a href='https://yfafrankmek.ng/portal/verify_email.php?code={$code}'>Verify your email</a></p><p class='text-center '>If you can't click the link, kindly copy it below and paste in your browser.</p><p class='text-center '>https://yfafrankmek.ng/portal/verify_email.php?code=<?php echo $code; ?></p><p class='text-center '>This verification link is only valid for 24 hours.</p><p class='text-center '>For any enquiry or further question, you can send us an email to info@yfafrankmek.ng</p></div></div></div></body></html>";

$data = array("personalizations"=>array(array("to"=>array(array("email"=>"$to","name"=>"")))),"subject"=>"Activate Your Account","from"=>array("email"=>"no-reply@yfafrankmek.ng","name"=>"FRANKMEK GLOBAL - YFA"),"content"=>array(array("type"=>"text/html","value"=>"$email")));

endif;

if($email_type == "password_reset_code"):

$email = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><title>Untitled Document</title><style type='text/css'>@media screen and (max-device-width: 480px) and (orientation: portrait){.col-1{width:80%;padding:10px}}@media screen and (max-device-width: 640px) and (orientation: landscape){.col-1{width:80%;padding:10px}}@media screen and (max-device-width: 640px){.col-1{width:80%;padding:10px}}@media screen and (max-device-width: 960px){.col-1{width:80%;padding:10px}}.bg-light{background-color:#f8f9fa!important}.auto{margin-left:auto;margin-right:auto}.container{max-width:960px;margin-left:auto;margin-right:auto}.row{width:100%;display:block;padding:10px}.bg-white{background:#FFF}.border{border:1px solid #F7F7F7}.text-center{text-align:center}</style></head><body class='bg-light'><div class='container bg-light '><div class='row '><div class='col-1 bg-white auto'><p class='text-center '>You requested to request your password.</p><p class='text-center '>Use the code below to reset your password.</p> <p class='text-center '>{$code}</p><p class='text-center '>For any enquiry or further question, you can send us an email to support@esteem.finance</p></div></div></div></body></html>";

$data = array("personalizations"=>array(array("to"=>array(array("email"=>"$to","name"=>"")))),"subject"=>"[Esteem Finace] Password Reset","from"=>array("email"=>"no-reply@esteem.finance","name"=>"Esteem Finance"),"content"=>array(array("type"=>"text/html","value"=>"$email")));

endif;

$data = json_encode($data);
echo $data;
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.sendgrid.com/v3/mail/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>$data,
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer ".$api_key,
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>
