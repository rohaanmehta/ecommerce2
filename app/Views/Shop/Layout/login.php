<style>
  .fb {
    background-color: #3B5998;
    color: white;
    width: 100%;
    max-width: 400px;
    height: 40px;
    padding-top: 8px;
  }

  .twitter {
    background-color: #55ACEE;
    color: white;
    width: 100%;
    max-width: 400px;
    height: 40px;
    padding-top: 8px;
  }

  .google {
    background-color: #dd4b39;
    color: white;
    width: 100%;
    max-width: 400px;
    height: 40px;
    padding-top: 8px;
  }

  .login_Input {
    width: 100%;
    max-width: 400px;
    height: 40px;
    padding-top: 8px;
  }

  .login_Links:hover {
    color: #fff
  }


  .login-box {
    position: absolute;
    top: 50%;
    left: 50%;
    -ms-transform: translate(-50%, -50%) !important;
    transform: translate(-50%, -50%) !important;
    max-width: 350px;
  }
</style>
<!-- Modal -->
<div class="modal fade" id="loginexampleModal" tabindex="-1" role="dialog" aria-labelledby="loginexampleModalLabel" aria-hidden="true">
  <div class="modal-dialog login-box w-100" role="document" style=''>
    <div class="modal-content">
      <div class="m-2">
        <div class="text-center w-100" style='margin-top:20px;font-size:25px'>
          <p>LOGIN</p>
        </div>
        <form class='login-form'>
          <div class="m-auto" style='width:90%'>
            <div class="mb-2">
              <a href="#" class="fb btn login_Links">
                <i class="fa fa-facebook fa-fw"></i> Login with Facebook
              </a>
            </div>
          </div>
          <div class="m-auto" style='width:90%'>
            <div class="mb-2">
              <a href="#" class="google btn login_Links"><i class="fa fa-google fa-fw">
                </i> Login with Google
              </a>
            </div>
          </div>
          <div class="m-auto" style='width:90%'>
            <div class="mb-2 mt-3 mb-3">
              <hr class='m-auto login_Input mb-0' style='padding-top:1px;height:0px;background: #d9d9d9;'>
            </div>
          </div>
          <div class="m-auto" style='width:90%'>
            <div class="mb-2">
              <input type='text' class='m-auto login_Input form-control rounded-0' name='email' id='email' placeholder='Email Address' />
            </div>
          </div>
          <div class="m-auto" style='width:90%'>
            <div class="mb-2">
              <input type='password' class='m-auto login_Input form-control rounded-0' name='password' id='password' placeholder='Password ' />
              <div class="error-font text-danger mb-2 h6" id='loginmsg' style='display:none;'>Wrong username or password !</div>
            </div>
          </div>
          <div class="m-auto" style='width:90%'>
            <div class="mb-2">
              <button class='login_Input login_Input_submit login_Links btn rounded-0 btn-dark'>LOGIN</button>
            </div>
          </div>
          <div class="row text-center justify-content-center mb-0">
            <p class='mb-2' style='color:#666;font-size:14px;'>Don't have an account ? <a style='text-decoration:none;color:#000' href='<?= base_url("register") ?>'>Register Here </a>
          </div>
          <div class="text-center">
            <a style="text-decoration:none;color:#666;font-size:14px;" href='<?= base_url('/forgot-password');?>'> Forgot Password </a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>