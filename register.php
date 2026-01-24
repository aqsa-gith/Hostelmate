<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>HostelMate – Student Registration</title>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@400;500&display=swap" rel="stylesheet">

<style>
*{margin:0;padding:0;box-sizing:border-box}
body{font-family:'Inter',sans-serif;background:#fff;overflow:auto;}
.marquee{background:#0d3a80;color:white;padding:6px 0;}
.marquee marquee{font-size:13px}

/* FORM CARD */
.form-wrapper{height:auto;display:flex;justify-content:center;align-items:flex-start;padding:16px;}
.form-card{width:75%;background:rgba(255,255,255,0.7);backdrop-filter:blur(12px);border-radius:26px;padding:32px 40px;box-shadow:0 30px 80px rgba(0,0,0,.2);position:relative;overflow:auto;}
.header-row{display:flex;align-items:center;gap:12px;margin-bottom:22px;}
.header-logo{width:46px;height:46px;border-radius:12px;overflow:hidden;}
.header-logo img{width:100%;height:100%;object-fit:cover;}
.form-title{font-family:'Playfair Display',serif;font-size:28px;color:#0d3a80;margin-bottom:16px;}

/* FLEX LEFT + IMAGE */
.form-left-wrapper{display:flex;align-items:flex-start;gap:20px;}
.form-left{flex:1;display:flex;flex-direction:column;}
.field{margin-bottom:0;margin-top:12px;}
label{font-size:13px;margin-bottom:6px;display:block;}
input, select{width:100%;height:48px;padding:0 14px;font-size:14px;border-radius:14px;border:1px solid #000;background:#fff;transition:.3s;}
input:hover, select:hover{box-shadow:0 0 15px rgba(13,58,128,.4);transform:scale(1.02);}

/* IMAGE COLUMN */
.image-column{display:flex;flex-direction:column;justify-content:space-between;width:160px;flex-shrink:0;}
.image-block{display:flex;flex-direction:column;align-items:center;gap:6px;}
.image-heading{font-size:14px;font-weight:500;color:#0d3a80;text-align:center;}
.image-box{width:140px;height:180px;border:2px dashed #0d3a80;border-radius:18px;display:flex;align-items:center;justify-content:center;background:#fff;cursor:pointer;overflow:hidden;position:relative;}
.image-box span{font-size:12px;color:#0d3a80;text-align:center;display:block;}
.image-box img{width:100%;height:100%;object-fit:contain;display:none;position:absolute;top:0;left:0;}
.image-box input{position:absolute;inset:0;opacity:0;cursor:pointer;}

/* DIVIDER */
.divider{height:2px;background:#0d3a80;margin:28px 0 18px;}

/* EDUCATION */
.grid-2{display:grid;grid-template-columns:repeat(2,1fr);gap:20px;}

/* DOCUMENTS */
.docs{display:grid;grid-template-columns:1fr 1fr;gap:20px;}
.doc-box{border:2px dashed #0d3a80;border-radius:16px;padding:20px;text-align:center;cursor:pointer;}
.doc-box input{display:none}

/* REGISTER BUTTON */
.register-btn{margin-top:30px;width:100%;height:52px;font-size:16px;font-weight:bold;background:linear-gradient(135deg,#0d6efd,#003f9e);color:white;border:none;border-radius:18px;cursor:pointer;transition:.3s;}
.register-btn:hover{box-shadow:0 0 25px rgba(13,110,253,.7);transform:scale(1.03);}

/* MODAL */
body.modal-open .form-card{filter:blur(6px);pointer-events:none;}
#confirmationModal{position:fixed;inset:0;background:rgba(0,0,0,0.6);display:flex;align-items:center;justify-content:center;z-index:9999;}
.modal-content{background:#fff;padding:30px 40px;border-radius:18px;width:400px;text-align:center;}
.modal-content h2{margin-bottom:20px;font-size:18px;color:#0d3a80;}
.options{display:flex;justify-content:space-between;gap:10px;}
.options button{flex:1;padding:10px 0;border:none;border-radius:12px;background:#0d6efd;color:white;font-weight:bold;cursor:pointer;transition:.3s;}
.options button:hover{background:#003f9e;}
.code-inputs{display:flex;justify-content:center;gap:10px;margin:20px 0;}
.code-inputs input{width:50px;height:50px;text-align:center;font-size:24px;border:2px solid #0d3a80;border-radius:8px;}
.resend{font-size:14px;}

/* SUCCESS ANIMATION */
.success-wrapper{display:none;flex-direction:column;align-items:center;justify-content:center;gap:20px;}
.circle-tick{position:relative;width:100px;height:100px;border-radius:50%;border:4px solid #0d6efd;display:flex;align-items:center;justify-content:center;animation:drawCircle 1s forwards;}
.tick{position:absolute;width:40px;height:20px;border-left:4px solid #0d6efd;border-bottom:4px solid #0d6efd;transform:rotate(-45deg) scale(0);animation:showTick 0.5s forwards 1s;}
@keyframes drawCircle{from{stroke-dashoffset:100;}to{stroke-dashoffset:0;}}
@keyframes showTick{from{transform:rotate(-45deg) scale(0);}to{transform:rotate(-45deg) scale(1);}}

.success-text{font-size:16px;color:#0d3a80;text-align:center;}
.success-btn{padding:12px 20px;border:none;border-radius:16px;background:#0d6efd;color:white;cursor:pointer;transition:.3s;}
.success-btn:hover{background:#003f9e;box-shadow:0 0 15px #0d6efd;}
</style>
</head>
<body>
<div class="marquee">
  <marquee scrollamount="6">Must fill all the fields and register yourself at HostelMate for your hostel updates</marquee>
</div>

<div class="form-wrapper">
  <form class="form-card" action="register_action.php" method="POST" enctype="multipart/form-data">

    <div class="header-row">
      <div class="header-logo">
        <img src="https://i.ibb.co/HL3qVtZY/uet-lahore-Logo-PNG-Vector-CDR-Free-Download.jpg">
      </div>
      <div class="form-title">Student Registration</div>
    </div>

    <div class="form-left-wrapper">
      <div class="form-left">
        <div class="field"><label>Name</label><input type="text" name="student_name" required></div>
        <div class="field"><label>Father Name</label><input type="text" name="father_name" required></div>
        <div class="field"><label>Phone Number</label><input type="tel" name="phone" placeholder="03XXXXXXXXX" required></div>
        <div class="field"><label>CNIC</label><input type="text" name="cnic" placeholder="XXXXX-XXXXXXX-X" required></div>
        <div class="field"><label>Gmail</label><input type="email" name="email" placeholder="example@gmail.com" required></div>

        <div class="divider"></div><h3>Account Security</h3>
        <div class="grid-2">
          <div class="field"><label>Password</label><input type="password" name="password" placeholder="Enter Password" required></div>
          <div class="field"><label>Confirm Password</label><input type="password" name="confirm_password" placeholder="Confirm Password" required></div>
        </div>
      </div>

      <div class="image-column">
        <div class="image-block">
          <div class="image-heading">Add Your Image</div>
          <label class="image-box">
            <input type="file" name="student_image" accept="image/*" id="studentImage" required>
            <span>Attach<br>Student Image</span>
            <img id="studentPreview">
          </label>
        </div>
        <div class="image-block">
          <div class="image-heading">Add Your ID Card</div>
          <label class="image-box">
            <input type="file" name="id_card_image" accept="image/*" id="idImage" required>
            <span>Attach<br>ID Card Photo</span>
            <img id="idPreview">
          </label>
        </div>
      </div>
    </div>

    <div class="divider"></div><h3>Education Related</h3>
    <div class="grid-2">
      <div><label>Degree Type</label><select name="degree" required><option value="">Select</option><option>BS</option><option>MS</option><option>PhD</option></select></div>
      <div><label>Department</label><input type="text" name="department" required></div>
      <div><label>Semester</label><input type="text" name="semester" required></div>
      <div><label>Major</label><input type="text" name="major" required></div>
    </div>
    <div class="field" style="margin-top:18px"><label>CGPA</label><input type="text" name="cgpa" required></div>

    

    <button type="submit" class="register-btn">DONE</button>

  </form>
</div>


<script>
// IMAGE PREVIEW
function previewImage(inputId, imgId){
  const input=document.getElementById(inputId);
  const img=document.getElementById(imgId);
  const box = img.parentElement;

  input.addEventListener("change",()=> {
    const file=input.files[0];
    if(file){
      const reader=new FileReader();
      reader.onload=e=>{
        img.src=e.target.result;
        img.style.display="block";
        box.querySelector("span").style.display="none";
      }
      reader.readAsDataURL(file);
    }
  });
}
previewImage("studentImage","studentPreview");
previewImage("idImage","idPreview");


// SHOW SUCCESS
function showSuccess(){
  document.getElementById('modalStep2').style.display='none';
  document.getElementById('successStep').style.display='flex';
}

// BACK TO LOGIN
function goToLogin(){
  window.location.href="index.php";
}
</script>
</body>
</html>
