<!DOCTYPE html>
<html>
  <!-- Head -->
  <?php include 'application/views/common/head.php'; ?>
  <body>
    <div class="container">
      <div class="row">
        <!-- Navbar menu -->
        <?php include 'application/views/common/menu.php'; ?>
        <!-- Header -->
        <?php include 'application/views/common/header.php'; ?>
      </div>
      <div class="row">
        <div class="span6 offset3">
          <div class="rounded-box">
            <p class="lead"><?=lang('contact.message')?></p>
            <form name="contact_form" method="post" action="<?php echo site_url('contact/submit'); ?>" enctype="multipart/form-data">
              <ul class="unstyled">
                <li>
                  <label for="name"><?=lang('contact.name.label')?></label>
                  <input type="text" name="name" placeholder="<?=lang('contact.name.placeholder')?>" required autofocus>
                </li>
                <li>
                  <label for="email"><?=lang('contact.email.label')?></label>
                  <input type="email" name="email" placeholder="<?=lang('contact.email.placeholder')?>" required>
                </li>
                <li>
                  <label for="description"><?=lang('contact.text.label')?></label>
                  <textarea class="span5" name="description" height="80" cols="80" rows="6" placeholder="<?=lang('contact.text.placeholder')?>"></textarea>
                </li>
                <li>
                  <button class="btn btn-blue" type="submit"><?=lang('contact.button')?></button>
                </li>
              </ul>
            </form>
          </div>
        </div>
      </div>  
    </div>
<!-- Footer -->
    <footer>
      <?php include 'application/views/common/footer.php'; ?>
    </footer>
  </body>
</html>