<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {
        
        //Creacion del objeto de email
        $mail = new PHPMailer();
        
        //Configuración SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'b6354160701a8b';
        $mail->Password = 'db9e772ee533e5';
        //$mail->SMTPSecure = 'tls'; 

        //Configurar contenido email
        $mail->setFrom('cuentas@croknticos.com');
        $mail->addAddress('cuentas@croknticos.com', 'Croknticos.com');
        $mail->Subject = 'Confirma tu cuenta';

        // Configurar contenido HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has creado tu cuenta en Croknticos, solo debes confirmarla presionando el siguiente enlace</p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/confirmar-cuenta?token=". $this->token ."'>Confirmar Cuenta</a> </p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje </p>";
        $contenido .= '</html>';
        
        $mail->Body = $contenido;

        //Enviar el Mail
        //$mail->send();
        //debuguear($mail);

        if(!$mail->Send()) {
            echo "Error al enviar el mensaje: $mail->ErrorInfo";
            //var_dump($mail);
        }

    }

    public function enviarInstrucciones() {

        //Creacion del objeto de email
        $mail = new PHPMailer();
        
        //Configuración SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'b6354160701a8b';
        $mail->Password = 'db9e772ee533e5';
        //$mail->SMTPSecure = 'tls'; 

        //Configurar contenido email
        $mail->setFrom('cuentas@croknticos.com');
        $mail->addAddress('cuentas@croknticos.com', 'Croknticos.com');
        $mail->Subject = 'Reestablece tu password';

        // Configurar contenido HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has solicitado reestablecer tu password, sigue el siguiente enlace para hacerlo. </p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/recuperar?token=". $this->token ."'>Reestablecer password</a> </p>";
        $contenido .= "<p>Si tu no solicitaste esta cambio, puedes ignorar el mensaje </p>";
        $contenido .= '</html>';
        
        $mail->Body = $contenido;

        //Enviar el Mail
        //$mail->send();
        //debuguear($mail);

        if(!$mail->Send()) {
            echo "Error al enviar el mensaje: $mail->ErrorInfo";
            //var_dump($mail);
        }

    }
}

?>