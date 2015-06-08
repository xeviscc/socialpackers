<!DOCTYPE html>
<html>
  <!-- Head -->
  <?php include 'application/views/common/head.php'; ?>
  <body>
    <!-- Header -->
    <?php include 'application/views/common/header.php'; ?>

    <div class="container">
      <div class="row">
        <?php include 'application/views/common/menu.php'; ?>
      </div>
      <div class="row">
      <div class="span10 offset1">
      
        <form name="project_filter_form" method="post" action="<?=site_url('project/filter')?>" enctype="multipart/form-data">
        <ul class="unstyled">
          <li class="span2">
            <label for="country"><?=lang('project.sch.country')?></label>
            <input type="text" list="countries_dl" name="country">
          </li>                                 
          <li class="span2">
            <label for="start_date"><?=lang('project.sch.start')?></label>
            <input type="date" name="start-date" placeholder="dd/MM/yyyy" >
          </li>
          <li class="span2">
            <label for="end_date"><?=lang('project.sch.end')?></label>
            <input type="date" name="end-date" placeholder="dd/MM/yyyy" >
          </li>
          <li class="span2">
            <label for="skills"><?=lang('project.sch.skills')?></label>
            <input type="number" name="skills">
          </li>
          <li class="span2">
            <input type="submit" name="Filter" value="<?=lang('project.sch.filter')?>">
          </li>
        </ul>
        </form>
        </div>
        
      </div>
      <!-- Content -->
      <!-- TODO: Prepare for multilingual -->
      <div class="row">
        <div class="span10 offset1">
          <?php foreach ( $project_list as $project ) {
          
          echo '<div class="rounded-box">';
            echo '<ul class="unstyled">';
              echo '<li>';
                echo 'Project Id: '.$project->getId();
              echo '</li>';
              echo '<li>';
                echo 'Organizer: '.$project->getOrganizer();
              echo '</li>';
              echo '<li>';
                echo 'Country: '.$project->getCountryCode();
              echo '</li>';
              echo '<li>';
                echo 'Name: '.$project->getName();
              echo '</li>';
              echo '<li>';
                echo 'Description: '.$project->getDescription();
              echo '</li>';
            echo '</ul>';
            echo '<p><a class="btn btn-primary" href="'.site_url('project/signup').'/'.$project->getId().'">Sign up</a> <a class="btn" href="'.site_url('project/more').'/'.$project->getId().'">More</a></p>';
          echo '</div>';
          
          } ?>
        
        </div>
      </div>
    </div>

    <!-- Footer -->
    <?php include 'application/views/common/footer.php'; ?>
  </body>
</html>