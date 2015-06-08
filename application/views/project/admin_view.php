                               <!DOCTYPE html>
<html>
  <!-- Head -->
  <? include 'application/views/common/head.php'; ?>
  <body>
    <!-- Country datalist -->
    <script>
      var list = [
        <? if(isset($country_list)) { ?>
        <? foreach ( $country_list as $country ) { ?>
          { label: "<?=$country->getName()?>", value: "<?=$country->getCode()->getCode()?>" },
        <? } ?>
        {}
        <? } ?> 
      ];
    </script>
    <div class="container">
      <div class="row">
        <? include 'application/views/common/menu.php'; ?>
        <!-- Header -->                        
        <? include 'application/views/common/header.php'; ?>
      </div>
      <div class="row">
        <div class="span10 offset1">
          <div class="tabbable">
            <ul class="nav nav-tabs">
              <!-- CREATE TABS PROJECTS -->
              <? foreach ( $project_list as $project ) {
                echo '<li><a id="tab_proj_'.$project->getId().'_title" href="#tab_proj_'.$project->getId().'" data-toggle="tab">';
                echo $project->getName();
                echo '</a></li>';
              } ?>
            </ul>
            <div class="tab-content">
              <!-- CREATE TABS FROM PROJECTS DYNAMICALLY -->
              <? foreach ( $project_list as $project ) { ?>
                <div class="tab-pane" id="tab_proj_<?=$project->getId()?>">
                  <div id="view_project_<?=$project->getId()?>">
                    <!-- VIEW PROJECT [Params needed: $project : StProjects and $userProject : array(StUserProject)] -->
                    <? include 'application/views/project/project_admin_detail.php'; ?>
                    <br>
                    <? foreach($tasks[$project->getId()] as $task) { ?>
                      <!-- VIEW TASK [Params needed: $task : StTasks] -->
                      <? include 'application/views/project/task.php'; ?>
                      <br>
                    <? } ?>
                  </div>
                </div>
              <? } ?>
              <!-- END CREATE TABS FROM PROJECTS DYNAMICALLY -->
            </div>
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