<?php
include('header.php');
?>
<div class="container-fluid loginForm">
  <div class="row login-form">
    <div class="col-lg-4 col-xl-4 d-none d-lg-inline-block d-xl-inline-block">
      <img class="imgsize" src="imgs/tom-barrett-M0AWNxnLaMw-unsplash.jpg" alt="best tourism company">
    </div>
    <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 login-form-area">   
      <div class="wide-form-group lora">
        <h3 id="signin">Already have an account?</h3>
        <form method="post" class="have-account-form" action="index.php?controller=action&action=doLogin">
          <input placeholder="E-mail address" class="bokgrp lora logining" type="text" name="exist_strEmail" id=""required>
          <div class="single">
            <div class="icon bok eye"></div>
            <input placeholder="Password" class="bokgrp lora logining" type="password" name="exist_strPassword" id=""required>
          </div>
          <input type="submit" value="Sign in" class="subbtn lora">
        </form>
      </div>
      <div class="row">
      <hr><h4>OR</h4><hr>
      </div>
      <div class="wide-form-group lora">
        <h3 id="signup">Create an account</h3>
        <p class="<?=$existError?>" id="error-create">Email address is already exist</p>
        <form method="post" class="have-account-form" action="index.php?controller=action&action=doRegister">
        <input placeholder="First name" class="bokgrp lora logining" type="text" name="register_firstname" id="" required>
        <input placeholder="Last name" class="bokgrp lora logining" type="text" name="register_lastname" id="" required>
          <input placeholder="E-mail address" class="bokgrp lora logining" type="text" name="register_email" id="" required>
          <div class="single">
            <div class="icon bok eye"></div>
            <input placeholder="Password" class="bokgrp lora logining" type="password" name="register_password" id="" required>
          </div>
          <input type="submit" value="Sign up" class="subbtn lora">
        </form>
      </div>
    </div>
  </div>

</div>

</div>
<?php
include('footer.php');
?>