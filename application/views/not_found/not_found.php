<!DOCTYPE html>
<html>
  <!-- Head -->
  <?php include 'application/views/common/head.php'; ?>
  <body>
    <br/>
    <div class="container hero-unit">
      <div class="row">
        <div class="span6 offset3">
          <br/>
          <h1><?=lang('notfound.wow')?></h1>
          <p><?=lang('notfound.wow.message')?></p>
          <br/>
          <h1><?=lang('notfound.404')?>.</h1>
          <p><?=lang('notfound.404.message')?></p>
          <br/>
          <p><a class="btn btn-primary btn-large" href="javascript:history.back();"><?=lang('notfound.back')?></a></p>
          <br/>
        </div>
      </div>
    </div>
  </body>
</html>