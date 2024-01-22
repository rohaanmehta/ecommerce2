<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>
<style>
.login_Input{
    width: 100%;
    max-width: 400px;
    height:40px;
    padding-top: 8px;
}
.login_Links:hover{
    color:#fff
}
</style>
<div class='invisible'>gap fill</div>
<div class="mb-5">
    <div class="text-center w-100" style='margin-top:20px;font-size:25px'>
        <p>CREATE A ACCOUNT</p>
    </div>
  <form action="/action_page.php">
    <div class="row text-center">
      <div class="col-lg-12 m-2">
        <input type='text' class='m-auto login_Input form-control rounded-0' placeholder='First Name'/>
      </div>
    </div>
    <div class="row text-center">
      <div class="col-lg-12 m-2">
        <input type='text' class='m-auto login_Input form-control rounded-0' placeholder='Last Name'/>
      </div>
    </div>
    <div class="row text-center">
      <div class="col-lg-12 m-2">
        <input type='text' class='m-auto login_Input form-control rounded-0' placeholder='COUNTRY'/>
      </div>
    </div>
    <div class="row text-center">
      <div class="col-lg-12 m-2">
        <input type='text' class='m-auto login_Input form-control rounded-0' placeholder='STATE'/>
      </div>
    </div>
    <div class="row text-center">
      <div class="col-lg-12 m-2">
        <input type='text' class='m-auto login_Input form-control rounded-0' placeholder='CITY'/>
      </div>
    </div>
    <div class="row text-center">
      <div class="col-lg-12 m-2">
        <input type='text' class='m-auto login_Input form-control rounded-0' placeholder='Email'/>
      </div>
    </div>
    <div class="row text-center">
      <div class="col-lg-12 m-2">
        <input type='password' class='m-auto login_Input form-control rounded-0' placeholder='Password'/>
      </div>
    </div>
    <div class="row text-center">
      <div class="col-lg-12 m-2">
        <button class='login_Input login_Links btn rounded-0 btn-dark'>SIGN UP</button>
      </div>
    </div>
    <div class="row text-center justify-content-center">
        <p> Returning Customer ? <a href='<?= base_url("login")?>' style='text-decoration:none' href=''> Sign In </a></p>
    </div>
  </form>
</div>
<?= $this->endSection() ?>

