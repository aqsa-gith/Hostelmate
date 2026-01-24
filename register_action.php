<?php
include 'config.php';

// Force errors to show on screen
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Sanitize Data
    $name     = mysqli_real_escape_string($conn, $_POST['student_name']);
    $father   = mysqli_real_escape_string($conn, $_POST['father_name']);
    $phone    = mysqli_real_escape_string($conn, $_POST['phone']);
    $cnic     = mysqli_real_escape_string($conn, $_POST['cnic']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password']; 
    $degree   = mysqli_real_escape_string($conn, $_POST['degree']);
    $dept     = mysqli_real_escape_string($conn, $_POST['department']);
    $semester = mysqli_real_escape_string($conn, $_POST['semester']);
    $major    = mysqli_real_escape_string($conn, $_POST['major']);
    $cgpa     = mysqli_real_escape_string($conn, $_POST['cgpa']);

    // 2. Handle File Uploads
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) { mkdir($target_dir, 0777, true); }

    $student_img = time() . "_" . $_FILES["student_image"]["name"];
    $id_card_img = time() . "_id_" . $_FILES["id_card_image"]["name"];

    move_uploaded_file($_FILES["student_image"]["tmp_name"], $target_dir . $student_img);
    move_uploaded_file($_FILES["id_card_image"]["tmp_name"], $target_dir . $id_card_img);

    // 3. The Query
    $sql = "INSERT INTO students (
                student_name, father_name, phone, cnic, email, 
                password, degree, department, semester, major, 
                cgpa, student_image, id_card_image
            ) VALUES (
                '$name', '$father', '$phone', '$cnic', '$email', 
                '$password', '$degree', '$dept', '$semester', '$major', 
                '$cgpa', '$student_img', '$id_card_img'
            )";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Success!'); window.location.href='index.php';</script>";
    } else {
        // THIS WILL TELL YOU EXACTLY WHAT IS WRONG
        echo "<h1>Database Error</h1>";
        echo "Error details: " . mysqli_error($conn);
    }
}
?>