<?php
header('Content-Type: application/json');
require_once 'config.php';

$fullName = trim($_POST['fullName']?? '');
$email = trim($_POST['email']?? '');
$phone = trim($_POST['phone']?? '');
$message = trim($_POST['message']?? '');

if(empty($fullName) || empty($phone) || empty($message) ||!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo json_encode(['status'=>'error','message'=>'Please fill all fields correctly']);
    exit;
}

$stmt = $conn->prepare("INSERT INTO enquiries (fullName, email, phone, message) VALUES (?,?,?,?)");
$stmt->bind_param("ssss", $fullName, $email, $phone, $message);

if($stmt->execute()){
    echo json_encode(['status'=>'success','message'=>'✅ Enquiry sent! We will call you!']);
} else {
    error_log($stmt->error);
echo json_encode(['status'=>'error','message'=>'Server error. Please WhatsApp 062 653 8701']);
}
?>