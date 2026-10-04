<?php
session_start();
require_once 'config.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD']!== 'POST') {
    echo json_encode(['status'=>'error','message'=>'Invalid request']); exit;
}

$name = trim($_POST['full_name']?? '');
$course = trim($_POST['course']?? '');
$rating = (int)($_POST['rating']?? 0);
$comment = trim($_POST['comment']?? '');

if(empty($name) || empty($course) || empty($comment) || $rating < 1 || $rating > 5){
    echo json_encode(['status'=>'error','message'=>'Please fill all fields correctly']); exit;
}

// FIX: Allow NULL user_id for guests
$user_id = $_SESSION['user_id'] ?? NULL;
if($user_id === NULL){
    $stmt = $conn->prepare("INSERT INTO reviews (full_name, course, rating, comment) VALUES (?,?,?,?)");
    $stmt->bind_param("ssis", $name, $course, $rating, $comment);
} else {
    $stmt = $conn->prepare("INSERT INTO reviews (user_id, full_name, course, rating, comment) VALUES (?,?,?,?,?)");
    $stmt->bind_param("issis", $user_id, $name, $course, $rating, $comment);
}

if($stmt->execute()){
    echo json_encode(['status'=>'success','message'=>'✅ Review posted! Thank you!']);
} else {
    error_log($stmt->error); // log, don't show user
    echo json_encode(['status'=>'error','message'=>'Could not save review. Call 062 653 8701']);
}
$stmt->close();
$conn->close();
?>