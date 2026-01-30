<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Admin Registration | HostelMate</title>

  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@400;500&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box
    }

    body {
      font-family: 'Inter', sans-serif;
      background: #eef2f9;
      overflow: auto
    }

    /* FORM CARD */
    .form-wrapper {
      display: flex;
      justify-content: center;
      padding: 20px
    }

    .form-card {
      width: 80%;
      background: rgba(255, 255, 255, 0.7);
      backdrop-filter: blur(14px);
      border-radius: 30px;
      padding: 36px 44px;
      box-shadow: 0 30px 80px rgba(0, 0, 0, .25);
    }

    /* HEADER */
    .header-row {
      display: flex;
      align-items: center;
      gap: 14px;
      margin-bottom: 26px
    }

    .header-logo {
      width: 52px;
      height: 52px;
      border-radius: 14px;
      overflow: hidden
    }

    .header-logo img {
      width: 100%;
      height: 100%;
      object-fit: cover
    }

    .form-title {
      font-family: 'Playfair Display', serif;
      font-size: 30px;
      color: #0d3a80
    }

    /* GRID */
    .grid-2 {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px
    }

    .field {
      margin-top: 14px
    }

    label {
      font-size: 13px;
      margin-bottom: 6px;
      display: block
    }

    /* INPUTS + GLOW */
    input,
    select {
      width: 100%;
      height: 50px;
      padding: 0 14px;
      font-size: 14px;
      border-radius: 16px;
      border: 1px solid #000;
      background: #fff;
      transition: .3s
    }

    input:hover,
    select:hover,
    input:focus,
    select:focus {
      box-shadow: 0 0 18px rgba(13, 58, 128, .45);
      transform: scale(1.02);
      outline: none;
    }

    /* IMAGE SECTION */
    .image-section {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
      margin-top: 30px
    }

    .image-box {
      height: 190px;
      border: 2px dashed #0d3a80;
      border-radius: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      cursor: pointer;
      position: relative;
      background: #fff;
      transition: .3s;
    }

    .image-box:hover {
      box-shadow: 0 0 20px rgba(13, 58, 128, .5);
    }

    .image-box span {
      font-size: 13px;
      color: #0d3a80;
      text-align: center
    }

    .image-box img {
      width: 100%;
      height: 100%;
      object-fit: contain;
      display: none;
      position: absolute
    }

    .image-box input {
      position: absolute;
      inset: 0;
      opacity: 0;
      cursor: pointer
    }

    /* BUTTON */
    .register-btn {
      margin-top: 36px;
      width: 100%;
      height: 54px;
      font-size: 17px;
      font-weight: bold;
      background: linear-gradient(135deg, #0d6efd, #003f9e);
      color: white;
      border: none;
      border-radius: 20px;
      cursor: pointer;
      transition: .3s
    }

    .register-btn:hover {
      box-shadow: 0 0 30px rgba(13, 110, 253, .7);
      transform: scale(1.04)
    }

    /* MODAL */
    body.modal-open .form-card {
      filter: blur(6px);
      pointer-events: none
    }

    #confirmationModal {
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, .6);
      display: none;
      align-items: center;
      justify-content: center;
      z-index: 9999
    }

    .modal-content {
      background: #fff;
      padding: 32px 40px;
      border-radius: 20px;
      width: 420px;
      text-align: center
    }

    .options {
      display: flex;
      gap: 12px;
      margin-top: 20px
    }

    .options button {
      flex: 1;
      padding: 12px;
      border: none;
      border-radius: 14px;
      background: #0d6efd;
      color: white;
      font-weight: bold;
      cursor: pointer;
      transition: .3s
    }

    .options button:hover {
      background: #003f9e
    }

    .code-inputs {
      display: flex;
      justify-content: center;
      gap: 12px;
      margin: 22px 0
    }

    .code-inputs input {
      width: 52px;
      height: 52px;
      text-align: center;
      font-size: 22px;
      border: 2px solid #0d3a80;
      border-radius: 10px
    }

    .resend {
      font-size: 14px;
      margin-top: 10px;
    }

    .resend span {
      color: #0d3a80;
      cursor: pointer;
      font-weight: bold
    }

    /* SUCCESS */
    .success-wrapper {
      display: none;
      flex-direction: column;
      align-items: center;
      gap: 18px
    }

    .circle-tick {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      border: 4px solid #0d6efd;
      display: flex;
      align-items: center;
      justify-content: center
    }

    .tick {
      width: 40px;
      height: 20px;
      border-left: 4px solid #0d6efd;
      border-bottom: 4px solid #0d6efd;
      transform: rotate(-45deg)
    }

    .success-btn {
      padding: 12px 22px;
      border: none;
      border-radius: 16px;
      background: #0d6efd;
      color: white;
      cursor: pointer;
      font-weight: bold;
      transition: .3s
    }

    .success-btn:hover {
      background: #003f9e;
      box-shadow: 0 0 15px #0d6efd;
    }
  </style>
</head>

<body>

  <div class="form-wrapper">
    <form class="form-card" action="admin-register-action.php" method="POST" enctype="multipart/form-data">

      <div class="header-row">
        <div class="header-logo">
          <img src="https://i.ibb.co/HL3qVtZY/uet-lahore-Logo-PNG-Vector-CDR-Free-Download.jpg">
        </div>
        <div class="form-title">Admin Registration</div>
      </div>

      <div class="form-left-wrapper">
        <div class="form-left">
          <div class="field"><label>Full Name</label><input type="text" name="full_name" required></div>
          <div class="field"><label>Hostel Code</label><input type="text" name="hostel_code" placeholder="e.g. H-10"
              required></div>
          <div class="field"><label>Official Email</label><input type="email" name="email" required></div>
          <div class="field"><label>Phone Number</label><input type="tel" name="phone" required></div>
          <div class="field"><label>CNIC / Staff ID</label><input type="text" name="cnic_staff_id" required></div>

          <div class="divider"></div>

          <div class="grid-2">
            <div class="field"><label>Password</label><input type="password" name="password" id="pass" required></div>
            <div class="field"><label>Confirm Password</label><input type="password" id="confirm_pass" required></div>
          </div>
        </div>

        <div class="image-section">
          <div class="image-block">

            <label class="image-box">
              <input type="file" name="admin_photo" accept="image/*" id="adminImage" required>
              <span>Attach<br>Photo</span>
              <img id="adminPreview">
            </label>
          </div>

          <div class="image-block">

            <label class="image-box">
              <input type="file" name="id_card_photo" accept="image/*" id="idCardImage" required>
              <span>Attach<br>ID Card</span>
              <img id="idCardPreview">
            </label>
          </div>

          <div class="image-block">

            <label class="image-box">
              <input type="file" name="staff_card_photo" accept="image/*" id="staffImage" required>
              <span>Attach<br>Staff Card</span>
              <img id="staffPreview">
            </label>


          </div>
        </div>
      </div>

      <button type="submit" class="register-btn">REGISTER ADMIN</button>
    </form>
  </div>

  <script>
    // Using your exact preview function style
    function previewImage(inputId, imgId) {
      const input = document.getElementById(inputId);
      const img = document.getElementById(imgId);
      if (!input || !img) return;
      const box = img.parentElement;

      input.addEventListener("change", () => {
        const file = input.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = e => {
            img.src = e.target.result;
            img.style.display = "block";
            box.querySelector("span").style.display = "none";
          }
          reader.readAsDataURL(file);
        }
      });
    }

    previewImage("adminImage", "adminPreview");
    previewImage("idCardImage", "idCardPreview");
    previewImage("staffImage", "staffPreview");

    // SHOW SUCCESS
    function showSuccess() {
      document.getElementById('modalStep2').style.display = 'none';
      document.getElementById('successStep').style.display = 'flex';
    }

    // BACK TO LOGIN
    function goToLogin() {
      window.location.href = "index.php";
    }
  </script>
</body>

</html>