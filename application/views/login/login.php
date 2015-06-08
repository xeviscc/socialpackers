<!DOCTYPE html>
<html>
  <!-- Head -->
  <?php include 'application/views/common/head.php'; ?>
  <body>
    <!-- Header -->                                                             
    <?php include 'application/views/common/header.php'; ?>
    <br />
    <?php 
      if(isset($error)){ 
        echo $error; 
      } 
    ?>
    <div class="container">
      <!-- Content -->
      <div class="row">
        <div class="span3 offset4">
          <div class="rounded-box">
            <form name="form1" method="post" action="<?=site_url('login/checklogin')?>">
              <div class="header-login">
                <?=lang('login.message')?>
              </div>
              <div class="body-login">
                <div class="body-login-pair">
                  <label>
                    <?=lang('login.email.label')?>
                  </label>
                  <input name="myusername" type="text" id="myusername">
                </div>
                <div class="body-login-pair">
                  <label>
                    <?=lang('login.password.label')?>
                  </label>
                  <input name="mypassword" type="password" id="mypassword">
                </div>
                <div class="body-login-forgot">
                  <a href="<?=site_url('forgot-password')?>"><?=lang('login.forgot')?></a>
                </div>
              </div>
              <div class="button-login">
                <input class="btn btn-primary" type="submit" name="Submit" value="<?=lang('login.button.login')?>">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <br />
    <!-- Footer -->
    <?php include 'application/views/common/footer.php'; ?>
  
  </body>
</html>