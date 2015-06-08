<!DOCTYPE html>
<html>
  <!-- Head -->
  <?php include 'application/views/common/head.php'; ?>
  <body>
    <!-- Header -->                                                             
    <?php include 'application/views/common/header.php'; ?>
    <div class="container">
      <div class="row">
        <div class="span10 offset1">
        <div class="rounded-box">
          <p class="lead">
            Please, enter your registration info.
            Remember that as much information you give us more specific info we can return in exchange.
          </p>
          <form name="registration_form" method="post" action="<?php echo site_url('register/submit'); ?>" enctype="multipart/form-data">
            <ul class="unstyled">
              <li>
                <label for="picture">Picture:</label>
                <input type="file" name="picture">
              </li>
              <li>
                <label for="name">Name:</label>
                <input type="text" name="name" placeholder="John" required autofocus>
              </li>
              <li>
                <label for="middle_name">MiddleName:</label>
                <input type="text" name="middle_name" placeholder="F.">
              </li>
              <li>
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" placeholder="Smith">
              </li>
              <li>
                <label for="email">Email:</label>
                <input type="email" name="email" placeholder="john.smith@socialpackers.com" required>
              </li>
              <li>
                <label for="password">Password:</label>
                <input type="password" name="password" id="p1" placeholder="xHKlYp4#" required>
              </li>
              <li>
                <label for="password2">Retype password:</label>
                <input type="password" name="password2" id="p2" placeholder="xHKlYp4#" required onfocus="st.validation.validatePass();" oninput="st.validation.validatePass();">
                <p id="message_psw"></p>
              </li>
              <li>
                <label for="birth">Birth date:</label>
                <input type="date" name="birth" placeholder="dd/MM/yyyy">
              </li>
              <li>
                <label for="description">Desciption:</label>
                <textarea class="span6" name="description" cols="80" rows="6" placeholder="I'm an imaginative guy that..."></textarea>
              </li>
              <li>
                <label for="what">What:</label>
                <textarea class="span6" name="what" height="80" cols="80" rows="6" placeholder="I would like to find a project that fits me."></textarea>
              </li>
              <li>
                <label for="sex">Sex:</label>
                <input type="radio" name="sex" value="male">Male
                <input type="radio" name="sex" value="female"> Female
                <br>
              </li>
              <li>                                                
                <p>
                  <br>
                  <input type="checkbox" name="termsncondition" required="">
                  Check to accept the <a href="<?php echo site_url('terms'); ?>">Terms and conditions</a>.
                  <br>
                </p>
              </li>
              <li>
                <button class="btn btn-blue" type="submit">Register</button>
              </li>
            </ul>
          </form> 
          </div> 
        </div>
      </div>
    </div>  
    <!-- Footer -->
    <?php include 'application/views/common/footer.php'; ?>
  </body>
</html>