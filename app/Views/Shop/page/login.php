<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>
<style>
.fb {
  background-color: #3B5998;
  color: white;
  width: 100%;
  max-width: 400px;
  height:40px;
  padding-top: 8px;
}

.twitter {
  background-color: #55ACEE;
  color: white;
  width: 100%;
  max-width: 400px;
  height:40px;
  padding-top: 8px;
}

.google {
  background-color: #dd4b39;
  color: white;
  width: 100%;
  max-width: 400px;
  height:40px;
  padding-top: 8px;
}
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
        <p>LOGIN</p>
    </div>
  <form action="/action_page.php">
    <div class="row text-center">
      <div class="col-lg-12 m-2">
        <a href="#" class="fb btn login_Links">
          <i class="fa fa-facebook fa-fw"></i> Login with Facebook
         </a>
      </div>
    </div>
    <div class="row text-center">
      <div class="col-lg-12 m-2">
        <a href="#" class="twitter btn login_Links">
          <i class="fa fa-twitter fa-fw"></i> Login with Twitter
        </a>
      </div>
    </div>
    <div class="row text-center">
      <div class="col-lg-12 m-2">
        <a href="#" class="google btn login_Links"><i class="fa fa-google fa-fw">
          </i> Login with Google+
        </a>
      </div>
    </div>
    <div class="row text-center">
      <div class="col-lg-12 mt-3 mb-3">
        <hr class='m-auto login_Input mb-0' style='padding-top:1px;height:0px;background: #d9d9d9;'>
      </div>
    </div>
    <div class="row text-center">
      <div class="col-lg-12 m-2">
        <input type='text' class='m-auto login_Input form-control rounded-0' placeholder='Email '/>
      </div>
    </div>
    <div class="row text-center">
      <div class="col-lg-12 m-2">
        <input type='password' class='m-auto login_Input form-control rounded-0' placeholder='Password '/>
      </div>
    </div>
    <div class="row text-center">
      <div class="col-lg-12 m-2">
        <button class='login_Input login_Links btn rounded-0 btn-dark'>SIGN IN</button>
      </div>
    </div>
    <div class="row text-center justify-content-center">
        <p>New Customer ? <a style='text-decoration:none' href='<?= base_url("register")?>'>Register Here </a> | <a style="text-decoration:none" href=''> Forgot Password </a></p>
    </div>
  </form>
</div>
<?= $this->endSection() ?>

