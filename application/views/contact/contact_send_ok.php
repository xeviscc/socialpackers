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
          <br>
      <div class="row hero-unit">
        <div class="span6 offset3">
          <br>
          <h1><?=lang('contact.ok')?></h1>
          <p><?=lang('contact.ok.message')?></p>
          <br>
          <p><a class="btn btn-primary btn-large" href="/"><?=lang('contact.button.back')?></a></p>
          <br>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <footer>
      <?php include 'application/views/common/footer.php'; ?>
    </footer>
  </body>
</html>