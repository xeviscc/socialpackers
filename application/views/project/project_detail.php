<!DOCTYPE html>
<html>
  <!-- Head -->
  <? include 'application/views/common/head.php'; ?>
  <body>
     
    <!-- Header -->                        
    <? include 'application/views/common/header.php'; ?>

    <div class="container">
      <div class="row">
        <? include 'application/views/common/menu.php'; ?>
      </div>
      <div class="row">
        <div class="span10 offset1">

                <div id="view_project_<?=$project->getId()?>">
                    
                    <div class="rounded-box">
                      <div class="lead"><?=$project->getName()?></div>  
                      <div class="row">
                        <div class="span2">
                          <img src="<?=$project->getPicture()?>"/>         
                        </div>
                        <div class="span5">
                          <div class="row">
                            <div class="span2">
                              Country: <?=countryNameByCode($country_list, $project->getCountryCode())?>
                            </div>
                            <div class="span2">
                              <p>
                                 <a class="btn btn-primary" href="<?=site_url('project/signup/'.$project->getId())?>">Sign up</a>
                                 
                              </p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="span5">
                              Description: <?=$project->getDescription()?>
                            </div>
                          </div>
                        </div>
                        <div class="span2">
                          <p>
                          <a class="btn " href="javascript:history.back()">Back</a>
                          </p>
                        </div>
                      </div>
                    </div>
                    
                  
                    <br>
                    <? foreach($tasks as $task) { ?>
                      <!-- VIEW TASK [Params needed: $task : StTasks] -->
                      <? include 'application/views/project/task.php'; ?>
                      <br>
                    <? } ?>
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