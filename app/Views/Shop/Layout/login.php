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
              <input type='text' class='m-auto login_Input form-control rounded-0' required name='email' placeholder='Email Address' />
            </div>
          </div>
          <div class="m-auto" style='width:90%'>
            <div class="mb-2">
              <input type='password' class='m-auto login_Input form-control rounded-0' required name='password' placeholder='Password ' />
              <span id='loginmsg' class='text-danger' style='display:none;font-size:12px;'>Wrong Username or Password </span>
            </div>
          </div>
          <div class="m-auto" style='width:90%'>
            <div class="mb-2">
              <button class='login_Input login_Links btn rounded-0 btn-dark'>LOGIN</button>
            </div>
          </div>
          <div class="row text-center justify-content-center">
            <p style='color:#666;font-size:14px;'>Don't have an account ? <a style='text-decoration:none;color:#000' href='<?= base_url("register") ?>'>Register Here </a>
              <!-- | <a style="text-decoration:none" href=''> Forgot Password </a></p> -->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('.login-form').submit(function(e) {
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: "<?= base_url('login-user') ?>",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        dataType: "json",
        success: function(data) {
          if (data.status == '200') {
            $('#msg').css('display', 'none');
            setTimeout(function() {
              // $('#download').css('display', 'block');
              // $('#loader').css('visibility', 'hidden');
              window.location.href = '<?= base_url(); ?>';
            }, 1000);
            // alert('registered_successfully');

          } else {
            $('#msg').css('display', 'block');
          }
        }
      });
    });
  });
</script>