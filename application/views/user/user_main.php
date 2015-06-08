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
    <!-- Header -->                        
    <? include 'application/views/common/header.php'; ?>

    <div class="container">
      <div class="row">
        <? include 'application/views/common/menu.php'; ?>
      </div>
      <div class="row">
        <div class="span10 offset1">
          <div class="tabbable">
            <ul class="nav nav-tabs">
              <li class="active"><a id="tab_search_title" href="#tab_search" data-toggle="tab"><b>Search</b></a></li>
              <li><a id="tab_friends_title" href="#tab_friends" data-toggle="tab"><b>Friends</b></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_search">
                <!-- SEARCH BOX -->
                <? include 'application/views/user/user_search.php'; ?>
                <br>
                
                <!-- SEARCH USERS LIST -->
                    <? foreach ( $users_list as $u ) { ?>
                      <!-- BEGIN PICTURE + NAME -->
                      <div class="row">
                        <div class="span9 rounded-style">
                          <div class="span1">
                            <img src="<?=$u->getPicture()?>" class="picroadmap"/>
                          </div>
                          <div class="span4">
                            <span class="nameroadmap"><?=$u->getName()?> <?=$u->getMiddleName()?> <?=$u->getLastName()?></span>
                          </div>
                          <div class="span3">
                            
                            <a href="#" id="butt_req" class="btn btn-red pull-right" onclick="alert("send message")" title="Send message"><i class="icon-envelope"></i></a>
                            <a href="<?=site_url('user/detail/'.$u->getId())?>" id="butt_req" class="btn btn-red pull-right" title="Send message">Detail</a>
                            <? if($u->getId() != $this->session->userdata('id') ){ ?>
                              <!-- TODO: Check if they are friends. Don't show!! -->
                              <a href="#" class="btn btn-blue pull-right" onclick="st_friends.requestFriendship(<?=$u->getId()?>)" title="Request friendship"><i class="icon-plus"></i><i class="icon-user"></i></a>
                            <? } ?>
                          </div>             
                        </div>
                      </div>
                      
                      <br>
                      <!-- END PICTURE + NAME -->
                    <? } ?>
                
              </div>
              <div class="tab-pane" id="tab_friends">
                <!-- FRIENDS LIST -->
                <div class="row">
                  <div class="span9">
                    <? if(isset($friends_list)) { ?>
                      <? foreach ( $friends_list as $friendsRel ) { ?>
                        <? $friends = $friendsRel->getFromUser(); ?>
                        <!-- BEGIN PICTURE + NAME -->
                        <div class="row">
                          <div class="span9 rounded-style">
                            <div class="span1">
                              <img src="<?=$friends->getPicture()?>" class="picroadmap"/>
                            </div>
                            <div class="span4">
                              <span class="nameroadmap"><?=$friends->getName()?> <?=$friends->getMiddleName()?> <?=$friends->getLastName()?></span>
                            </div>
                            <div class="span3">
                              <a href="#" id="butt_req" class="btn btn-red pull-right" onclick="alert("send message")" title="Send message"><i class="icon-envelope"></i></a>
                              <a href="<?=site_url('user/detail/'.$friends->getId())?>" id="butt_req" class="btn btn-red pull-right" title="Send message">Detail</a>
                            </div>             
                          </div>
                        </div>
                        
                        <br>
                        <!-- END PICTURE + NAME -->
                      <? } ?>
                    <? } else { ?>
                      <p>You do not have any friend.</p>
                    <? } ?>
                  </div>
                </div>
                <!-- FRIENDS LIST -->                  
              </div>
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