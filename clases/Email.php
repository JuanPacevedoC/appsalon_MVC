<?php

namespace Clases;

use PHPMailer\PHPMailer\PHPMailer;

class Email{

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion(){
        // crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'd8b8af3b69fd3d';
        $mail->Password = 'b64505eef5865b'; 

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Confirma tu cuenta';

        //set html
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UFT-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola" . " " .$this->nombre . "</strong> Has creado tu cuenta en App salon, solo debes confirmarla presionando el siguiente enlace</p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a>";  
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje ";
        $contenido .= "</html>";
        $mail->Body = $contenido;

        //enviar email
        $mail->send();
    }

    public function enviarInstrucciones(){
        // crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'd8b8af3b69fd3d';
        $mail->Password = 'b64505eef5865b'; 

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Restablecer Password';

        //set html
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UFT-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola" . " " .$this->nombre . "</strong> Has solicitado restablecer tu password, sigue el siguiente enlace para haverlo</p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/recuperar?token=" . $this->token . "'>Restablecer cuenta</a>";  
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje ";
        $contenido .= "</html>";
        $mail->Body = $contenido;

        //enviar email
        $mail->send();
    }
}

?>