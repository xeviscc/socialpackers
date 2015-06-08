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
              <li class="active"><a id="tab_search_title" href="#tab_search" data-toggle="tab"><b>Search</b></a></li>
              <li><a id="tab_subscribed_title" href="#tab_subscribed" data-toggle="tab"><b>Subscribed</b></a></li>
              <!-- CREATE TABS PROJECTS -->
              <? foreach ( $project_list as $project ) {
                $req = $userProject[$project->getId()];
                echo '<li><a id="tab_proj_'.$project->getId().'_title" href="#tab_proj_'.$project->getId().'" data-toggle="tab">';
                echo $project->getName();
                if(count($req)>0){
                  echo ' <b style="color:red;">('.count($req).')</b>';                  
                }
                echo '</a></li>';
              } ?>
              <!-- END CREATE TABS PROJECTS -->
              <li><a id="tab_create_title" href="#tab_create" data-toggle="tab"><b>Create Project</b></a></li>
              
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_search">
                <!-- SEARCH BOX -->
                <? include 'application/views/project/search.php'; ?>
                <br>
                
                <!-- SEARCH PROJECT LIST -->
                <div class="row">
                  <div class="span9" id="search_proj_cont">
                    <? foreach ( $all_project_list as $project ) { ?>
                      <div class="rounded-box item_proj">
                        <ul class="unstyled">
                          <li><?=$project->getName().' ('.countryNameByCode($country_list,$project->getCountryCode()).')'?></li>
                          <li><img src="<?=$project->getPicture()?>" width="100%"/></li>
                          <li>Organizer: <?=$project->getOrganizer()->getName()?></li>
                          <li>Description: <br><?=$project->getDescription()?></li>
                        </ul>
                        <p>
                          <a class="btn btn-primary" href="<?=site_url('project/signup/'.$project->getId())?>">Sign up</a>
                          <a class="btn" href="<?=site_url('project/more/'.$project->getId())?>">More</a>
                        </p>
                      </div>
                    <? } ?>
                  </div>
                </div>
                <!-- END SEARCH PROJECT LIST -->
                
              </div>
              <div class="tab-pane" id="tab_create">
                  <!-- INCLUDE CREATE PROJECT -->
                  <? include 'application/views/project/create.php'; ?>                  
              </div>
              <div class="tab-pane" id="tab_subscribed">
                <!-- SEARCH PROJECT LIST -->
                <div class="row">
                  <div class="span9" id="subs_proj_cont">
                    <? foreach ( $subscribed_project_list as $project ) { ?>
                      <div class="rounded-box item_proj">
                        <ul class="unstyled">
                          <li><?=$project->getName().' ('.countryNameByCode($country_list,$project->getCountryCode()).')'?></li>
                          <li><img src="<?=$project->getPicture()?>" width="100%"/></li>
                          <li>Organizer: <?=$project->getOrganizer()->getName()?></li>
                          <li>Description: <br><?=$project->getDescription()?></li>
                        </ul>
                        <p>
                          <a class="btn" href="<?=site_url('project/more/'.$project->getId())?>">More</a>
                        </p>
                      </div>
                    <? } ?>
                  </div>
                </div>
                <!-- END SEARCH PROJECT LIST -->                  
              </div>
              <!-- CREATE TABS FROM PROJECTS DYNAMICALLY -->
              <? foreach ( $project_list as $project ) { ?>
                <div class="tab-pane" id="tab_proj_<?=$project->getId()?>">
                  <div id="view_project_<?=$project->getId()?>">
                    <!-- VIEW PROJECT [Params needed: $project : StProjects and $userProject : array(StUserProject)] -->
                    <? include 'application/views/project/project_owner_view.php'; ?>
                    <br>
                    <? foreach($tasks[$project->getId()] as $task) { ?>
                      <!-- VIEW TASK [Params needed: $task : StTasks] -->
                      <? include 'application/views/project/task.php'; ?>
                      <br>
                    <? } ?>
                  </div>
                <!-- MODIFY PROJECT [Params needed: $project : StProjects] -->  
                <? include 'application/views/project/modify.php'; ?>
                  
                </div>
              <? } ?>
              <!-- END CREATE TABS FROM PROJECTS DYNAMICALLY -->
            </div>
          </div>
        </div>
      </div>

      <? if(isset($active_proj)){ ?>
        <!--Select the tab where we were-->
        <script>
          $("#tab_proj_<?=$active_proj?>_title").trigger('click');
        </script>
      <? } else { ?>
        <script>
          if(location.search == '?create_landing'){
            $("#tab_create_title").trigger('click');
          }
        </script>
      <? } ?>
    </div>
    <!-- Footer -->
    <footer>
      <?php include 'application/views/common/footer.php'; ?>
    </footer>
  </body>
</html>