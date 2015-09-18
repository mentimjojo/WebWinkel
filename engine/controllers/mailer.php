<?php
class Mailer{

    // Checks if done
    private $check = array(
        'from' => false,
        'reply' => false,
        'subject' => false,
        'receiver' => false,
        'message' => false
    );

    // Errors and return
    private $status = 0;
    private $errors;

    // Send mail from who
    private $from;

    // Set reply for the receiver
    private $reply_name;
    private $reply_email;

    // Subject
    private $subject;

    // Set receiver
    private $receiver;

    // Set message
    private $message;

    // Headers & HTML
    private $html = false;
    private $headers;

    // Construct
    public function __construct(){
        // Set array as object
        $this->check = (object)$this->check;
    }

    // Set from
    public function setFrom($from){
        // Check if form is empty
        if(empty($from)){
            // Set status and error
            $this->status = 0;
            $this->errors = "There is no from filled in.";
        } else {
            // Set from private
            $this->from = $from;
            // Set check on true
            $this->check->from = true;
        }
    }

    // Set reply data
    public function setReply($name, $email){
        // Check if name or email is empty
        if(empty($name) OR empty($email)) {
            // Set status and error
            $this->status = 0;
            $this->errors = "There is no reply name or email filled in.";
        } else {
            // Set reply name
            $this->reply_name = $name;
            // Set reply email;
            $this->reply_email = $email;
            // Set reply on true
            $this->check->reply = true;
        }
    }

    // Set subject
    public function setSubject($subject){
        // Check if subject is empty
        if(empty($subject)) {
            // Set status and error
            $this->status = 0;
            $this->errors = "There is no subject filled in.";
        } else {
            // Set subject
            $this->subject = $subject;
            // Set subject true
            $this->check->subject = true;
        }
    }

    // Set Receiver
    public function setReceiver($receiver){
        // Check if receiver is empty
        if(empty($receiver)){
            // Set status and error
            $this->status = 0;
            $this->errors = "There is no receiver filled in.";
        } else {
            // Set receiver
            $this->receiver = $receiver;
            // Set receiver op true
            $this->check->receiver = true;
        }
    }

    // Set message
    public function setMessage($html, $message){
        // Check if message is empty
        if(empty($message)){
            // Set status and error
            $this->status = 0;
            $this->errors = "There is no message filled in";
        } else {
            // Check if html is true
            if($html){
                // Set message with html
                $this->message = "<html><body>";
                $this->message .= $message;
                $this->message .= "</html></body>";
                // Set html on true
                $this->html = true;
            } else {
                // Message without html
                $this->message = $message;
            }
            // Set message on true
            $this->check->message = true;
        }
    }

    // Set headers
    public function setHeaders(){
        // Make headers array
        $this->headers = array();

        // Set mime version
        $this->headers[] = "MIME-Version: 1.0";

        // Check if html is on
        if($this->html){
            // Set headers html
            $this->headers[] = "Content-type:text/html;charset=UTF-8";
        } else {
            // Set headers plain
            $this->headers[] = "Content-type:text/plain;charset=UTF-8";
        }

        // Normal headers
        //$this->headers[] = "From: " .  $this->reply_name . " <".$this->reply_email.">";
        $this->headers[] = "Reply-To: " . $this->reply_name . " <" . $this->reply_email . ">";
        $this->headers[] = "Return-Path: " . $this->reply_name . " <" . $this->reply_email . ">";
        $this->headers[] = "From: <" . $this->from . ">";

        // Add php x mailer version
        $this->headers[] = "X-Mailer: PHP/".phpversion();
    }

    // Set mail
    public function sendMail(){
        // Check if all things are done
        if($this->check->from && $this->check->reply && $this->check->subject && $this->check->receiver && $this->check->message){
            // Set headers
            $this->setHeaders();
            // Send mail
            mail($this->receiver, $this->subject, $this->message, implode("\r\n", $this->headers));
            // Set success
            $this->status = 1;
            $this->errors = "Mail send...";
        } else {
            // Set status and error
            $this->status = 0;
            $this->errors = "Mail not send... Maybe one of the required functions not used?.";
        }
    }

    // Get return in number
    public function getReturnNumber(){
        // Return status
        return $this->status;
    }

    // Get return message
    public function getReturnMsg(){
        // Send return
        if($this->status == 1){
            $msg = "<span style='color: green'>".$this->errors."</span>";
        } else {
            $msg = "<span style='color: red'>".$this->errors."</span>";
        }

        // Return msg
        return $msg;
    }

}

?>