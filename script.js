let step = 1;

function showLogin(){
  login.classList.add("active");
  register.classList.remove("active");
  forgot.classList.remove("active");

  loginTab.classList.add("active");
  registerTab.classList.remove("active");

  tabs.style.display = "flex";
  actionBtn.innerText = "Login";
  step = 1;
}

function showRegister(){
  register.classList.add("active");
  login.classList.remove("active");
  forgot.classList.remove("active");

  registerTab.classList.add("active");
  loginTab.classList.remove("active");

  tabs.style.display = "flex";
  actionBtn.innerText = "Create Account";
}

function showForgot(){
  forgot.classList.add("active");
  login.classList.remove("active");
  register.classList.remove("active");

  tabs.style.display = "none";
  actionBtn.innerText = "Send OTP";

  emailStep.style.display = "block";
  otpStep.style.display = "none";
  passStep.style.display = "none";
  step = 1;
}

actionBtn.onclick = function(){
  if(!forgot.classList.contains("active")) return;

  if(step === 1){
    emailStep.style.display = "none";
    otpStep.style.display = "block";
    actionBtn.innerText = "Verify OTP";
    step = 2;
  }
  else if(step === 2){
    otpStep.style.display = "none";
    passStep.style.display = "block";
    actionBtn.innerText = "Reset Password";
    step = 3;
  }
  else{
    showLogin();
  }
}
let currentFlow = "login";

function hideAll(){
  login.classList.remove("active");
  register.classList.remove("active");
  forgot.classList.remove("active");
  otp.classList.remove("active");
}

function showLogin(){
  hideAll();
  login.classList.add("active");
  tabs.style.display="flex";
  loginTab.classList.add("active");
  registerTab.classList.remove("active");
  actionBtn.innerText="Login";
  currentFlow="login";
}

function showRegister(){
  hideAll();
  register.classList.add("active");
  tabs.style.display="flex";
  registerTab.classList.add("active");
  loginTab.classList.remove("active");
  actionBtn.innerText="Create Account";
  currentFlow="register";
}

function showForgot(){
  hideAll();
  forgot.classList.add("active");
  tabs.style.display="none";
  actionBtn.innerText="Send OTP";
  currentFlow="forgot";
}

function showOTP(){
  hideAll();
  otp.classList.add("active");
  tabs.style.display="none";
  actionBtn.innerText="Verify OTP";
}

actionBtn.onclick = function(){
  if(currentFlow === "login" || currentFlow === "register" || currentFlow === "forgot"){
    showOTP();
  } else {
    showLogin();
  }
}