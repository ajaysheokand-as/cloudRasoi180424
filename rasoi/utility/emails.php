<?php
try{
$data = json_decode(file_get_contents('php://input'), true);
 if (isset($data['name']) && isset($data['mobile_no']) && isset($data['email_address']) && isset($data['message'])) {
    if (strlen($data['mobile_no']) >= 10) {
        $name = $data['name'];
        $mobile_no = $data['mobile_no'];
        $email_address = ($data['email_address']);
        $message = ($data['message']);

        $message_data = $message . "From: Name:"."$name"."Mobile No: " . $mobile_no . "Email ID : " .$email_address;
        echo $message_data;
        send_email($email_address,"New Contact Request From ".$name,$message_data);
    }else{
        echo json_encode( [
            'success' => false,
            'message' => "Enter a valid Mobile Number",
        ]);
        return;
    }
 }

}catch(Exception $e){
    echo $e;
}

function send_email($from,$subject,$message){
    $headers = `From: $from` . "\r\n" .
    `Reply-To: $from` . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    $to = "cloudrasoioffcial@gmail.com";
    try{
        if($from==""){
            throw "Please Enter Email";
        }elseif($subject == ""){
            throw "Please Enter Subject";
        }elseif($message==""){
            throw "Please Enter Message";
        }else{
           $response =  mail($to, $subject, $message, $headers);
           if($response == 1){
             echo json_encode( [
                'success' => true,
                'message' => "Email Sent Successfull",
            ]);
            return;
           }else{
            echo json_encode( [
                'success' => false,
                'message' => "Oohoo .... Email could not be sent.
                Please go back and try again!",
            ]);
            return;
           }
        }
    }
    catch(Exception $e){
        $error = $e->getMessage();
        echo json_encode( [
            'success' => false,
            'message' => $error,
        ]);
    }

}
