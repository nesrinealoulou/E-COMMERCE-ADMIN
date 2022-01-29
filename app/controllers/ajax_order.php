<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
Class Ajax_order extends Controller
{
    public function index() {
        //$data = file_get_contents("php://input") ; 
         
         
        $data = (object)$_POST;
        $order = $this->loadModel('OrdersClass');
        $user = $this->loadModel('UserClass');

       

        if(is_object($data) && isset($data->data_type))
        {
            if($data->data_type == 'edit_order')
            {
                
                $order->edit($data);
                $arr['message'] = "your row was successfully edited" ;
                $_SESSION['error']="" ; 
                $arr['message_type'] = "info" ;
                $cats = $order->get_en_attente() ;
                $arr['data'] = $order->make_table($cats) ;
                $arr['data_type'] = "edit_order" ;
                echo json_encode($arr) ;
                $this->sendEmail($user->getEmail($data->id_user)) ;
                
            }
        }
        
    }
    public function sendEmail($email) {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Username   = 'belghuithkadhem@gmail.com';                     //SMTP username
            $mail->Password   = 'azeqsd123456';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->SMTPAuth = true;  // authentication enabled
            $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
            $mail->SMTPAutoTLS = false;
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;                                  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('belghuithkadhem@gmail.com', 'Mailer');
            $mail->addAddress($email);     //Add a recipient
        
        
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'comfirmation du commande';
            $mail->Body    = 'votre commande est bien livrée';
            
        
            $mail->send();
        } catch (Exception $e) {
        }
    }
 }