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
        <div class="span10 offset1">
        <div class="rounded-box">
          <p class="lead"><?=lang('profile.label')?></p>
          <form name="registration_form" method="post" action="<?=site_url('profile/modify')?>" enctype="multipart/form-data">
            <ul class="unstyled">
              <li>
                <label for="picture"><?=lang('profile.pic.label')?></label>
                <img src="<?=$picture?>" style="max-width:200px;">
                <input type="file" name="picture" value="<?=$picture?>">
              </li>
              <li>
                <label for="name"><?=lang('profile.name.label')?></label>
                <input type="text" name="name"  value="<?=$name?>" required autofocus>
                <input type="hidden" name="id"  value="<?=$id?>">
              </li>
              <li>
                <label for="middle_name"><?=lang('profile.mid.label')?></label>
                <input type="text" name="middle_name"  value="<?=$middle_name?>">
              </li>
              <li>
                <label for="last_name"><?=lang('profile.last.label')?></label>
                <input type="text" name="last_name"  value="<?=$last_name?>">
              </li>
              <li>
                <label for="email"><?=lang('profile.email.label')?></label>
                <input type="email" name="email"  value="<?=$email?>" required>
              </li>
              <li>
                <label for="birth"><?=lang('profile.birth.label')?></label>
                <input type="date" id="datepicker" name="birth" value="<?=$birth?>">
                <script> if(!Modernizr.inputtypes.date){ $('#datepicker').datepicker({dateFormat: "yy-mm-dd" }); } </script>
              </li>
              <li>
                <label for="description"><?=lang('profile.desc.label')?></label>
                <textarea class="span6" name="description" cols="80" rows="6"><?=$description?></textarea>
              </li>
              <li>
                <label for="what"><?=lang('profile.what.label')?></label>
                <textarea class="span6" name="what" height="80" cols="80" rows="6"><?=$what?></textarea>
              </li>
              <li>
                <label for="sex"><?=lang('profile.gender.label')?></label>
                <?php if($sex=='m') {?>
                  <input type="radio" name="sex" value="male" checked><?=lang('profile.gender.male')?>
                  <input type="radio" name="sex" value="female"><?=lang('profile.gender.female')?>
                <?php } else {?>
                  <input type="radio" name="sex" value="male"><?=lang('profile.gender.male')?>
                  <input type="radio" name="sex" value="female" checked><?=lang('profile.gender.female')?>
                <?php } ?>
                <br>
              </li>
              <li>
                <button class="btn btn-blue" type="submit"><?=lang('profile.button')?></button>
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