<?php
if(empty($_POST['nome'])  || empty($_POST['email'])){
	echo '<script> alert("Erro, preencha os campos obrigatorios!") </script>';
	echo '<script language="JavaScript"> window.history.back() </script>';
	exit();
}

$nome = $_POST['nome'];
$email = $_POST['email'];
$contato = $_POST['contato'];
$evento = $_POST['evento'];
$data = $_POST['data'];
$convidados = $_POST['convidados'];
$message = $_POST['mensagem'];
$message = nl2br($message);

if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",$email)){
	echo '<script> alert("Erro, o e-mail inserido nao possui um formato valido. (ex: email@dominio.com)") </script>';
	echo '<script language="JavaScript"> window.history.back() </script>';
	exit();
}

$to  = 'recepcoes@solardlourdes.com.br';
$subject = 'Orcamento - Site';
$message =  'Esta mensagem foi enviada do site solardlourdes.com.br' . "<br><br>".
			"<b>Nome:</b> ".$nome."<br>".
			"<b>E-mail:</b> ".$email."<br>".
			"<b>Contato:</b> ".$contato."<br><br>".
			"<b>Tipo do Evento:</b> ".$evento."<br>".
			"<b>Data da Festa:</b> ".$data."<br>".
			"<b>No. de Convidados:</b> ".$convidados."<br>".
			"==============================<br>".
			"<b>Mensagem:</b> <br>".
			$message;

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'To: recepcoes@solardlourdes.com.br' . "\r\n";
$headers .= 'From: ' . $email . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);
echo '<script> alert("Sua mensagem foi enviada com sucesso! Aguarde e entraremos em contato brevemente.") </script>';
		echo '<script language="JavaScript"> window.location="contato.html" </script>';
?>