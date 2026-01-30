<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Hostel Portal</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Roboto:wght@400;500&display=swap');

*{margin:0;padding:0;box-sizing:border-box;}
body{font-family:'Roboto',sans-serif;background:#fff;overflow:hidden;height:100vh;}
canvas{position:fixed;inset:0;z-index:-1;}

/* LEFT PANEL */
.left-panel{
  position:absolute;
  top:8%;
  left:5%;
  width:45%;
  height:90%;
  color:#000;
  display:flex;
  flex-direction:column;
  gap:20px;
}

.uni-header{display:flex;align-items:center;gap:16px;}
.badge-small{
  width:80px;
  border-radius:16px;
  box-shadow:0 6px 18px rgba(0,0,0,0.25);
}

.uni-text h1{
  font-family:'Playfair Display',serif;
  font-size:48px;
  color:#0d3a80;
  font-weight:900;
}

.uni-text h4,.uni-text p{color:#000;}
.uni-text p.italic{font-style:italic;font-size:14px;}
.uni-text p.orange{font-size:12px;color:orange;font-weight:bold;}

.divider{
  height:2px;
  background:#0d6efd;
  margin:8px 0;
  border:none;
}

.left-text h2,p{color:#000;}

.register-btn{
  padding:14px 24px;
  background:#0d6efd;
  color:#fff;
  border:none;
  border-radius:16px;
  font-weight:bold;
  cursor:pointer;
  margin-top:12px;
  transition:0.3s;
}

.register-btn:hover{
  background:#0056b3;
  box-shadow:0 0 15px #0d6efd,0 0 25px #0d6efd;
}

/* GLASS CARD */
.glass-card{
  position:absolute;
  right:5%;
  top:50%;
  transform:translateY(-50%);
  width:380px;
  padding:36px;
  border-radius:26px;
  background:rgba(255,255,255,0.1);
  backdrop-filter:blur(8px);
  border:1px solid rgba(0,0,0,0.2);
  box-shadow:0 20px 60px rgba(0,0,0,0.2);
  display:flex;
  flex-direction:column;
  gap:14px;
  transition:0.6s ease, opacity 0.6s ease;
  z-index:2;
}

.glass-card:hover{
  transform:translateY(-50%) scale(1.02);
}

.card-bg{
  position:absolute;
  inset:0;
  background:url('https://i.ibb.co/JWPgCgy8/1b2d9854062216564de42e39e83513aa.jpg') center/cover no-repeat;
  border-radius:26px;
  opacity:0.3;
  pointer-events:none;
}

/* HEADINGS */
.glass-card h2{
  font-family:'Playfair Display',serif;
  font-size:28px;
  text-align:center;
  margin-bottom:20px;
}

/* INPUTS */
input{
  padding:12px;
  border-radius:14px;
  border:1px solid #000;
  background:rgba(255,255,255,0.15);
  transition:0.3s;
}

input:hover{
  transform:scale(1.03);
  background:rgba(255,255,255,0.2);
}

input::placeholder{
  color:rgba(0,0,0,0.5);
}

/* BUTTON */
button{
  padding:13px;
  border-radius:16px;
  border:none;
  background:linear-gradient(135deg,#0d6efd,#003f9e);
  color:#fff;
  cursor:pointer;
  transition:0.3s;
}

button:hover{
  transform:scale(1.05);
  box-shadow:0 15px 40px rgba(0,123,255,0.45);
}

/* LOGIN TOGGLE LINKS */
.toggle-link{
  text-align:center;
  font-size:12px;
  color:#0000EE;
  cursor:pointer;
  margin-top:10px;
  transition:0.3s;
}
.toggle-link:hover{color:#003f9e; text-decoration:underline;}

/* FOOTER NAV */
.footer-nav{
  position:absolute;
  bottom:20px;
  left:5%;
  z-index:10;
}

.footer-nav ul{
  display:flex;
  gap:20px;
  list-style:none;
}

.footer-nav li{
  position:relative;
  padding:10px 15px;
  background:rgba(0,0,0,0.05);
  backdrop-filter:blur(6px);
  border-radius:16px;
  cursor:pointer;
  transition:0.3s;
}

.footer-nav li:first-child{
  box-shadow:0 0 20px #0d6efd,0 0 40px #0d6efd;
}

.footer-nav li:hover{
  box-shadow:0 0 15px #0d6efd,0 0 25px #0d6efd;
}

.footer-nav li i{
  opacity:0;
  position:absolute;
  left:50%;
  top:50%;
  transform:translate(-50%,-50%);
  transition:0.25s;
}

.footer-nav li span{
  transition:0.25s;
}

.footer-nav li:hover span{opacity:0;}
.footer-nav li:hover i{opacity:1;}

/* BUILDING IMAGE BOXES */
.image-links{
  display:flex;
  justify-content:flex-start;
  gap:20px;
  margin-top:30px;
}

.building-box{
  position:relative;
  width:150px;
  height:150px;
  border-radius:16px;
  overflow:hidden;
  cursor:pointer;
  transition:0.3s;
  flex-shrink:0;
}

.building-box img{
  width:100%;
  height:100%;
  object-fit:cover;
  display:block;
  transition:0.3s;
}

.building-box .building-name{
  position:absolute;
  bottom:0;
  width:100%;
  text-align:center;
  background:rgba(13,58,128,0.7);
  color:#fff;
  font-size:12px;
  padding:4px 0;
  opacity:0;
  transition:0.3s;
}

.building-box:hover img{
  transform:scale(1.05);
  box-shadow:0 0 20px rgba(13,58,128,0.6);
  z-index:2;
}

.building-box:hover .building-name{
  opacity:1;
}

/* COPYRIGHT & PRIVACY */
.copyright-box{
  position:absolute;
  right:5%;
  bottom:20px;
  width:380px;
  padding:12px 20px;
  border-radius:20px;
  background:rgba(255,255,255,0.15);
  backdrop-filter:blur(12px);
  border:1px solid rgba(0,0,0,0.2);
  text-align:center;
  font-size:12px;
  color:#000;
  box-shadow:0 10px 30px rgba(0,123,255,0.2);
  transition:0.3s;
  z-index:2;
}

.copyright-box:hover{
  box-shadow:0 0 20px #0d6efd,0 0 40px #0d6efd;
  transform:scale(1.02);
}

.copyright-box a{
  color:#0d6efd;
  text-decoration:none;
  font-weight:bold;
}
</style>
</head>

<body>

<canvas id="grid"></canvas>

<!-- LEFT PANEL -->
<div class="left-panel">
  <div class="uni-header">
    <img src="https://i.ibb.co/HL3qVtZY/uet-lahore-Logo-PNG-Vector-CDR-Free-Download.jpg" class="badge-small">
    <div class="uni-text">
      <h1>U E T</h1>
      <h4>UNIVERSITY OF ENGINEERING & TECHNOLOGY, LAHORE</h4>
      <p class="orange">The Best Way to predict your future is to create it - 104 years of excellence</p>
    </div>
  </div>

  <hr class="divider">

  <div class="left-text">
    <marquee scrollamount="6">
      All old and new hostelites of University of Engineering & Technology must register themselves on this website
    </marquee>

    <hr class="divider">

    <h2>WELCOME TO HOSTELMATE - your own hostel partner</h2>
    <p>Making life easier for hostelites of UET</p>
    <p>Because we care for your comfort</p>

    <button class="register-btn" onclick="window.location.href='register.php'">Register Here</button>
    <button class="register-btn" onclick="window.location.href='admin-register.php'">Admin Registration</button>

    <div class="image-links">
      <a href="https://ibb.co/fGZYXWjx" class="building-box">
        <img src="https://i.ibb.co/84GDmw17/9328ed4d62c97b0d703198809d082e09.jpg">
        <div class="building-name">UET MAIN AUDITORIUM</div>
      </a>
      <a href="https://imgbb.com/" class="building-box">
        <img src="https://i.ibb.co/pvZYy5S7/1-Xq09x8-Mn5-Tp-MD3-AJ7t1-GNg.jpg">
        <div class="building-name">IB&M</div>
      </a>
      <a href="https://ibb.co/gZ3v500x" class="building-box">
        <img src="https://i.ibb.co/SwPQhkkz/1706592674249.jpg">
        <div class="building-name">NATIONAL LIBRARY</div>
      </a>
    </div>
  </div>
</div>

<!-- LOGIN CARDS CONTAINER -->
<div id="loginContainer">

  <!-- STUDENT LOGIN -->
  <div class="glass-card" id="studentLogin">
    <div class="card-bg"></div>
    <h2>Welcome Back!</h2>

    <input type="text" placeholder="Student Name *" id="studentNameInput" required>
    <input type="text" placeholder="Student ID *" id="studentIdInput" required>
    <input type="password" placeholder="Password *" id="passwordInput" required>
    <div class="error-message" id="studentError">Please fill all fields!</div>
    <button onclick="loginStudent()">Login</button>
    <div class="toggle-link" onclick="showAdminLogin()">Not a student? Go to admin login</div>
  </div>
  <!-- ADMIN LOGIN -->
  <div class="glass-card" id="adminLogin" style="opacity:0;pointer-events:none;position:absolute;top:50%;right:5%;transform:translateY(-50%);">
    <div class="card-bg"></div>
    <h2>Admin Login</h2>

    <input type="text" placeholder="Name" id="adminNameInput">
    <input type="text" placeholder="Your Hostel Code" id="adminCodeInput">
    <input type="text" placeholder="Staff ID" id="adminIdInput">
    <input type="password" placeholder="Password" id="adminPasswordInput">
    <button onclick="loginAdmin()">Login</button>
    <div class="toggle-link" onclick="showStudentLogin()">Not an admin? Go back to student login</div>
  </div>

</div>

<!-- FOOTER NAV -->
<div class="footer-nav">
  <ul>
    <li onclick="window.location.href='index.php'"><i class="fas fa-home"></i><span>Home</span></li>
    <li onclick="window.location.href='about.html'"><i class="fas fa-info-circle"></i><span>About</span></li>
    <li onclick="window.location.href='contact.html'"><i class="fas fa-phone"></i><span>Contact</span></li>
    <li onclick="window.location.href='gallery.html'"><i class="fas fa-image"></i><span>Gallery</span></li>
    <li onclick="window.location.href='faq.html'"><i class="fas fa-question-circle"></i><span>FAQ</span></li>
  </ul>
</div>

<!-- COPYRIGHT -->
<div class="copyright-box">
  © 2025 HostelMate. All Rights Reserved |
  <a href="privacy.html">Privacy Policy</a>
</div>

<script>
function loginStudent(){
  const name = document.getElementById('studentNameInput').value || "Student";
  localStorage.setItem("studentName", name);
  window.location.href = "login.html";
}

function loginAdmin() {
  const name = document.getElementById('adminNameInput').value || "Admin";
  const code = document.getElementById('adminCodeInput').value || "N/A";
  const staffId = document.getElementById('adminIdInput').value;
  const password = document.getElementById('adminPasswordInput').value;

  if (!staffId || !password) {
    alert("Please enter Staff ID and Password");
    return;
  }

  // Store data for the HTML dashboard to read
  localStorage.setItem("adminName", name);
  localStorage.setItem("adminCode", code);
  localStorage.setItem("adminStaffId", staffId);

  
  window.location.href = "admin-dashboard.html"; 
}
function showAdminLogin(){
  const studentCard = document.getElementById('studentLogin');
  const adminCard = document.getElementById('adminLogin');

  studentCard.style.opacity = 0;
  studentCard.style.pointerEvents = "none";

  adminCard.style.opacity = 1;
  adminCard.style.pointerEvents = "auto";
}

function showStudentLogin(){
  const studentCard = document.getElementById('studentLogin');
  const adminCard = document.getElementById('adminLogin');

  studentCard.style.opacity = 1;
  studentCard.style.pointerEvents = "auto";

  adminCard.style.opacity = 0;
  adminCard.style.pointerEvents = "none";
}

// 3D Grid Background
const canvas=document.getElementById("grid");
const ctx=canvas.getContext("2d");

function resize(){
  canvas.width=window.innerWidth;
  canvas.height=window.innerHeight;
}
resize();
window.addEventListener("resize",resize);

let mouse={x:-1000,y:-1000};
window.addEventListener("mousemove",e=>{
  mouse.x=e.clientX;
  mouse.y=e.clientY;
});

const spacing=40;
const influence=180;

function draw(){
  ctx.clearRect(0,0,canvas.width,canvas.height);

  for(let x=0;x<canvas.width;x+=spacing){
    for(let y=0;y<canvas.height;y+=spacing){
      const dx=mouse.x-x;
      const dy=mouse.y-y;
      const dist=Math.sqrt(dx*dx+dy*dy);

      if(dist<influence){
        const alpha=1-dist/influence;
        ctx.strokeStyle=`rgba(0,0,0,${alpha*0.35})`;

        ctx.beginPath();
        ctx.moveTo(x-spacing/2,y);
        ctx.lineTo(x+spacing/2,y);
        ctx.stroke();

        ctx.beginPath();
        ctx.moveTo(x,y-spacing/2);
        ctx.lineTo(x,y+spacing/2);
        ctx.stroke();
      }
    }
  }
  requestAnimationFrame(draw);
}
draw();
</script>

</body>
</html>
