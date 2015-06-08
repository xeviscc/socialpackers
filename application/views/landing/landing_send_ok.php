<!DOCTYPE html>
<html>
  <!-- Head -->
  <?php include 'application/views/common/head.php'; ?>
  <body>
    <!-- Header -->
    <?php include 'application/views/common/header.php'; ?>
    <br/>
    <div class="container hero-unit">
      <div class="row">
        <div class="span6 offset3">
          <br/>
          <h1><?=lang('landing.ok')?></h1>
          <p><?=$this->lang->line('landing.ok.message',$email)?></p>
          <br/>
          <p><a class="btn btn-primary btn-large" href="/"><?=lang('landing.button.back')?></a></p>
          <br/>
        </div>
      </div>
    </div>
  </body>
</html>