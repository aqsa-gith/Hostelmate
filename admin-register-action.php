<?php
include 'config.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Sanitize Data (Your existing sanitization)
    $name     = mysqli_real_escape_string($conn, $_POST['full_name']);
    $h_code   = mysqli_real_escape_string($conn, $_POST['hostel_code']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $phone    = mysqli_real_escape_string($conn, $_POST['phone']);
    $cnic     = mysqli_real_escape_string($conn, $_POST['cnic_staff_id']);
    $password = $_POST['password']; 

    // 2. Handle 3 File Uploads (Your existing upload logic)
    $target_dir = "uploads/admins/";
    if (!is_dir($target_dir)) { mkdir($target_dir, 0777, true); }

    $admin_img = time() . "_adm_" . $_FILES["admin_photo"]["name"];
    $id_img    = time() . "_id_" . $_FILES["id_card_photo"]["name"];
    $staff_img = time() . "_stf_" . $_FILES["staff_card_photo"]["name"];

    move_uploaded_file($_FILES["admin_photo"]["tmp_name"], $target_dir . $admin_img);
    move_uploaded_file($_FILES["id_card_photo"]["tmp_name"], $target_dir . $id_img);
    move_uploaded_file($_FILES["staff_card_photo"]["tmp_name"], $target_dir . $staff_img);

    // 3. The SQL Query
    $sql = "INSERT INTO admins (full_name, hostel_code, email, phone, cnic_staff_id, password, admin_photo, id_card_photo, staff_card_photo) 
            VALUES ('$name', '$h_code', '$email', '$phone', '$cnic', '$password', '$admin_img', '$id_img', '$staff_img')";

    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Admin Registration Successful!'); window.location.href='index.php';</script>";
       
    } else {
        echo "<h1>Database Error</h1>";
        echo "Error details: " . mysqli_error($conn);
    }
    
}
?>