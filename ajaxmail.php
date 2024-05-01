<?php
if(isset($_POST) && !empty($_POST)){
	$full_name = (isset($_POST['full_name']))?$_POST['full_name']:'';
	$email = (isset($_POST['email']))?$_POST['email']:'';
	$cel = (isset($_POST['cel']))?$_POST['cel']:'';
	$consumo = (isset($_POST['consumo']))?$_POST['consumo']:'';
	$message = (isset($_POST['message']))?$_POST['message']:'';
	
	$form_type = 'contact';
	$sendMessage = $mailSubject = '';
	
	if($form_type == 'contact'){
		$mailSubject = 'Olá, um cliente mandou mensagem!';
		$sendMessage = "<p>Olá,</p><p>".$full_name." enviou uma mensagem como  </p><p><b>Contato:</b> ".$cel."</p><p><b>Consumo KWh / R$:</b> ".$consumo."</p><p><b>Endereço email:</b> ".$email."</p><p><b>Mensagem: </b> ".$message."</p>";
	}elseif($_POST['form_type'] == 'inquiry'){
		$mailSubject = 'Inquiry Details';
		$sendMessage = '';
	}
	
	if($sendMessage != ''){
		$fromEmail = $email;
		$toEmail = 'nucleosolar.energia@gmail.com';
		
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= "From: <$fromEmail>" . "\r\n";

		if(mail($toEmail , $mailSubject , $sendMessage , $headers )){
		    
			echo 1;
			
		}else{
			echo 0;
		}
	}else{
		echo 0;
	}
}else{
	echo 0;
}
die();
?>

