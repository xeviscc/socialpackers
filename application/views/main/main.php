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
        <div class="span8 offset1">
          
            <? if(isset($items_list)) {
                foreach($items_list as $item){?>
                  <?switch ($item->getType()->getType()) {
                      case "TIP":  $tip = $relation_list[$item->getId()]; 
                        if(isset($tip)){ ?>
                        <div class="rounded-box" style="border: solid 1px;border-color: rgb(200,200,200);">
                          <div class="box-tip-header">
                            <div class="row">
                              <div class="span5">
                                <img src="<?=$tip->getIdUser()->getPicture()?>" style="height:30px;width:30px;"/>
                                &nbsp;
                                <a href="<?=site_url('user/detail/'.$tip->getIdUser()->getId())?>">
                                    @<?=$tip->getIdUser()->getName().' '.$tip->getIdUser()->getMiddleName().' '.$tip->getIdUser()->getLastName()?>
                                </a>
                                &nbsp;published a new tip
                              </div>
                              <div class="span2 pull-right">
                                <b style="color:red">TIP</b>
                              </div>
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="span6">
                              <?=$tip->getTip()?>
                            </div>
                            <div class="span1">
                              <a class="btn btn-small" href="<?=site_url('tips/favorite/'.$tip->getId())?>">Fovourite</a>
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="span2 box-tip-footer">
                              Categories: 
                              <? $tokens = explode(";",$tip->getCategories());
                                  foreach ( $tokens as $cat ) { ?>
                                      <a href="<?=site_url('tips/filter/?cat='.$cat)?>"><span class="category"><?=$cat?></span></a>
                              <? } ?>
                            </div>
                            <div class="span2 offset2">
                              Country: <?=countryNameByCode($country_list, $tip->getCountryCode()->getCode())?>
                            </div>
                            <div class="span1 pull-right">
                              <?=$tip->getPublicationDate()->format('d/m/Y')?>
                            </div>
                          </div>
                        </div>
                        <? $itemId = $tip->getId() ?>
                        <!-- COMMENTS [Params needed: $itemId : int and $item : StComment and $comments_list: array()] -->
                        <? include 'application/views/main/comments_for_item.php'; ?>
                        <? }
                        break;
                      case "COMMENT": $comment = $relation_list[$item->getId()];
                          if(isset($comment)){ ?>
                            <div class="rounded-box"  style="border: solid 1px;border-color: rgb(200,200,200);">
                              <div class="box-tip-header">
                                <div class="row">
                                  <div class="span5">
                                    <img src="<?=$comment->getIdUser()->getPicture()?>" style="height:30px;width:30px;"/>
                                    &nbsp;
                                    <a href="<?=site_url('user/detail/'.$comment->getIdUser()->getId())?>">
                                        @<?=$comment->getIdUser()->getName().' '.$comment->getIdUser()->getMiddleName().' '.$comment->getIdUser()->getLastName()?>
                                    </a>
                                    &nbsp;setted a new status
                                  </div>
                                  <div class="span2 pull-right">
                                    <b style="color:red">STATUS</b>
                                  </div>
                                </div>
                              </div>
                              <br>
                              <div class="row">
                                <div class="span7">
                                  <?=$comment->getComment()?>
                                </div>
                              </div>
                              <br>
                              <div class="row">
                                <div class="span1 offset6 pull-right">
                                  <?=$comment->getDate()->format('d/m/Y')?>
                                </div>
                              </div>
                            </div>
                        <? $itemId = $comment->getId() ?>
                        <!-- COMMENTS [Params needed: $itemId : int and $item : StComment and $comments_list: array()] -->
                        <? include 'application/views/main/comments_for_item.php'; ?>
                          <? }
                          break;
                      case "MULTIMEDIA": $comment = $relation_list[$item->getId()];
                          if(isset($comment)){?>
                            <div class="rounded-box"  style="border: solid 1px;border-color: rgb(200,200,200);">
                              <div class="box-tip-header">
                                <div class="row">
                                  <div class="span5">
                                    <img src="<?=$comment->getIdUser()->getPicture()?>" style="height:30px;width:30px;"/>
                                    &nbsp;
                                    <a href="<?=site_url('user/detail/'.$comment->getIdUser()->getId())?>">
                                        @<?=$comment->getIdUser()->getName().' '.$comment->getIdUser()->getMiddleName().' '.$comment->getIdUser()->getLastName()?>
                                    </a>
                                    &nbsp;setted a new images
                                  </div>
                                  <div class="span2 pull-right">
                                    <b style="color:red">IMAGES</b>
                                  </div>
                                </div>
                              </div>
                              <br>
                              <div class="row">
                                <div class="span7">
                                  <img src="<?=$comment->getComment()?>" style="width:150px;"/>
                                </div>
                              </div>
                              <br>
                              <div class="row">
                                <div class="span1 offset6 pull-right">
                                  <?=$comment->getDate()->format('d/m/Y')?>
                                </div>
                              </div>
                            </div>
                        <? $itemId = $comment->getId() ?>
                        <!-- COMMENTS [Params needed: $itemId : int and $item : StComment and $comments_list: array()] -->
                        <? include 'application/views/main/comments_for_item.php'; ?>
                          <? }
                          break;
                      case "WAYPOINT":  $waypoints = $relation_list[$item->getId()];
                          if(isset($waypoints)){ 
                            $latlon = $waypoints->getLatitude().','.$waypoints->getLongitude();
                            ?>
                            <div class="rounded-box"  style="border: solid 1px;border-color: rgb(200,200,200);">
                              <div class="box-tip-header">
                                <div class="row">
                                  <div class="span5">
                                    <img src="<?=$waypoints->getIdUser()->getPicture()?>" style="height:30px;width:30px;"/>
                                    &nbsp;
                                    <a href="<?=site_url('user/detail/'.$waypoints->getIdUser()->getId())?>">
                                        @<?=$waypoints->getIdUser()->getName().' '.$waypoints->getIdUser()->getMiddleName().' '.$waypoints->getIdUser()->getLastName()?>
                                    </a>
                                    &nbsp;shared his position
                                  </div>
                                  <div class="span2 pull-right">
                                    <b style="color:red">WAYPOINT</b>
                                  </div>
                                </div>
                              </div>
                              <br>
                              <div class="row">
                                <div class="span7">
                                  <img src="http://maps.googleapis.com/maps/api/staticmap?center=<?=$latlon?>&zoom=11&size=200x200&sensor=false" style="width:150px;"/>
                                </div>
                              </div>
                              <br>
                              <div class="row">
                                <div class="span1 offset6 pull-right">
                                  <?=$waypoints->getCheckinDate()->format('d/m/Y')?>
                                </div>
                              </div>
                            </div>
                        <? $itemId = $waypoints->getId() ?>
                        <!-- COMMENTS [Params needed: $itemId : int and $item : StComment and $comments_list: array()] -->
                        <? include 'application/views/main/comments_for_item.php'; ?>
                          <? }
                          break;
                      case "PROJECT": $project = $relation_list[$item->getId()];
                          if(isset($project)){ ?>
                            <div class="rounded-box"  style="border: solid 1px;border-color: rgb(200,200,200);">
                              <div class="box-tip-header">
                                <div class="row">
                                  <div class="span5">
                                    <img src="<?=$project->getOrganizer()->getPicture()?>" style="height:30px;width:30px;"/>
                                    &nbsp;                                    
                                    <a href="<?=site_url('user/detail/'.$project->getOrganizer()->getId())?>">
                                        @<?=$project->getOrganizer()->getName().' '.$project->getOrganizer()->getMiddleName().' '.$project->getOrganizer()->getLastName()?>
                                    </a>
                                    &nbsp;published a new project
                                  </div>
                                  <div class="span2 pull-right">
                                    <b style="color:red">PROJECT</b>
                                  </div>
                                </div>
                              </div>
                              <br>
                              <div class="row">
                                <div class="span7 lead"><a href="<?=site_url('project/more/'.$project->getId())?>"><?=$project->getName()?></a></div>
                              </div>
                              <div class="row">
                                <div class="span2">
                                  <img src="<?=$project->getPicture()?>"/>         
                                </div>
                                <div class="span5">
                                  <?=$project->getDescription()?>
                                </div>
                              </div>
                              <br>
                              <div class="row">
                               <div class="span2 offset4">
                                  Country: <?=countryNameByCode($country_list, $project->getCountryCode())?>
                                </div>
                                <div class="span1 pull-right">
                                  <?=$item->getDate()->format('d/m/Y')?>
                                </div>
                              </div>
                            </div>
                        <? $itemId = $project->getId() ?>
                        <!-- COMMENTS [Params needed: $itemId : int and $item : StComment and $comments_list: array()] -->
                        <? include 'application/views/main/comments_for_item.php'; ?>
                          <? }
                          break;
                  }
                  
                }
              }
            ?>
          
          
          
        </div>
        <div class="span2" style="border:solid 1px; border-color:rgb(250,250,250);">
          <!-- Right column for adds -->
          Reserved space
        </div>
      </div>
    </div>
    <!-- Footer -->
    <footer>
      <?php include 'application/views/common/footer.php'; ?>
    </footer>
</body>
</html>