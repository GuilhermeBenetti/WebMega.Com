<?php
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
require './lib/vendor/autoload.php';
?>

<?php
        $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
 
        if (!empty($data['enviar'])) {
               
                if($mail = new PHPMailer(true));
                try {
                    $mail->CharSet = 'UTF-8';
                    $mail->isSMTP();
                    $mail->Host = 'smtp.kinghost.net';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'contato@megapontocom.com.br';
                    $mail->Password = 'Meg@com';
                    $mail->Port = 587;
                    $mail->setFrom('contato@megapontocom.com.br', 'Atendimento');
                    $mail->addAddress('contato@megapontocom.com.br', 'Administrador');
 
                    $mail->isHTML(true);
                    $mail->Subject = $data['nome']. " - " .$data['assunto'];
                    $mail->Body = "Nome Completo: " . $data['nome']."<br>Telefone: " . $data['telefone']."<br>E-mail: " . $data['email']."<br>Assunto: " . $data['assunto']."
                   <br>Mensagem: " . $data['mensagem'];
                    $mail->AltBody = "Nome Completo: " . $data['nome']."\nTelefone: " . $data['telefone']."\nE-mail: " . $data['email']."\nAssunto: " . $data['assunto']."
                   \nMensagem: " . $data['mensagem'];
 
                    $mail->send();
                    unset($data);
                    header('contato.html');
                    $_SESSION = 1;                   
                } catch (Exception $e) {
                    header('contato.html'); 
                    $_SESSION = 2;
                }
            } else {
                $_SESSION = 2;
                header('contato.html'); 
            }
        ?>