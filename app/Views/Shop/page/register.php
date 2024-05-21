<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>
<style>
  .login_Input {
    width: 100%;
    max-width: 400px;
    height: 40px;
    padding-top: 8px;
  }

  .login_Links:hover {
    color: #fff
  }
</style>
<div class='invisible'>gap fill</div>
<div class="mb-5">
  <div class="text-center w-100" style='margin-top:20px;font-size:25px'>
    <p>CREATE A ACCOUNT</p>
  </div>
  <form class='register-form' autocomplete="off">
    <div class='row'>
      <div class='col-12 col-md-3 m-auto'>
        <div class="form-group">
          <input type='text' class='form-control rounded-0' required name='first_name' placeholder='First Name' />
        </div>
        <div class="form-group">
          <input type='text' class='form-control rounded-0' required name='last_name' placeholder='Last Name' />
        </div>
        <div class="form-group">
          <input type='text' class='form-control rounded-0' autocomplete="off" required name='email' placeholder='Email' />
        </div>
        <div class="form-group">
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text bg-light">+91</div>
            </div>
            <input type='text' class='form-control' onkeypress="return event.charCode >= 48 && event.charCode <= 57" required name='mobile' placeholder='Mobile Number' />
          </div>
        </div>
        <div class="form-group">
          <input type='password' class='form-control rounded-0' required id='password' autocomplete="new-password" name='password' placeholder='Password' />
          <span class='text-danger' id='msg' style='display:none;font-size:13px;'> Password should be more than 6 characters </span>
          <span class='text-danger' id='msg2' style='display:none;font-size:13px;'> Password doesn't match </span>
        </div>
        <div class="form-group">
          <input type='password' class='form-control rounded-0' required id='confirm-password' name='confirm-password' placeholder='Confirm Password' />
        </div>
        <div class="form-group mb-0">
          <button class='login_Input login_Links btn rounded-0 btn-dark'>SIGN UP</button>
        </div>
      </div>
    </div>
    <div class="text-center justify-content-center">
      <p> Returning Customer ? <a data-toggle="modal" data-target="#loginexampleModal" class='text-dark' style='text-decoration:none' href=''> Login </a></p>
    </div>
  </form>
</div>
<script>
  $(document).ready(function() {
    $('.register-form').submit(function(e) {
      e.preventDefault();
      $('#msg').css('display', 'none');
      $('#msg2').css('display', 'none');

      if ($('#password').val().length < 6) {
        $('#msg').css('display', 'block');
        return false;
      }

      if ($('#password').val() != $('#confirm-password').val()) {
        $('#msg2').css('display', 'block');
        return false;
      }

      $.ajax({
        type: "POST",
        url: "<?= base_url('add_register_data') ?>",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        dataType: "json",
        success: function(data) {
          if (data.status == '200') {
            setTimeout(function() {
              // $('#download').css('display', 'block');
              // $('#loader').css('visibility', 'hidden');
              window.location.href = '<?= base_url(); ?>';
            }, 2000);
            // alert('registered_successfully');

          } else {
            alert('someything went wrong');
          }
        }
      });
    });
  });
</script>
<?= $this->endSection() ?>