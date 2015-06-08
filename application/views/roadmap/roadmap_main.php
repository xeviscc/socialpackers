<!DOCTYPE html>
<html>
  <!-- Head -->
  <?php include 'application/views/common/head.php'; ?>
  <body>
    <!-- Country datalist -->
    <script>
      var list = [
        <? foreach ( $country_list as $country ) { ?>
          { label: "<?=$country->getName()?>", value: "<?=$country->getCode()->getCode()?>" },
        <? } ?>
        {} 
      ];
    </script>
    <div class="container central">
      <div class="row">
        <!-- Navbar menu -->
        <?php include 'application/views/common/menu.php'; ?>
        <!-- Header -->
        <?php include 'application/views/common/header.php'; ?>
      </div>

      <!-- BEGIN PICTURE + NAME -->
      <div class="row" ondragleave="st_comments.changeToDropHereBack();" ondragenter="st_comments.changeToDropHere();" ondragover="return false;" >
        <div class="span10 offset1 rounded-style">
          <div class="span1">
            <img src="<?=$user->getPicture()?>" class="picroadmap"/>
          </div>
          <div class="span6">
            <span class="nameroadmap"><?=$user->getName()?> <?=$user->getMiddleName()?> <?=$user->getLastName()?></span>
            <br>
            <br>
            <input class="span5" type="text" id="status_id" placeholder="Share a thought or drop a picture" />
            &nbsp;&nbsp;
            <a href="#" onclick="st_comments.saveTextComment(<?=$roadmapID?>, 'status_id');" class="btn btn-blue btn-status">
              <i class="icon-font"></i><i class="icon-check"></i>
            </a>
            <a href="#" onclick="st_comments.uploadFiles(event,<?=$roadmapID?>)"  class="btn btn-blue btn-status">
              <i class="icon-picture"></i><i class="icon-check"></i>
            </a>
            <div align="left" id="thumbs_id" ondragleave="st_comments.changeToDropHereBack();"  ondragenter="st_comments.changeToDropHere();"  ondrop="st_comments.dropFilesIn(event, <?=$roadmapID?>);">    
              <output id="thumbs"></output>
              <div id="__text" style="display:none;">Drop Here</div> 
            </div>
            <div class="progress-container">
              <div id="progress"></div>
            </div>
          </div>
          <div class="span1">
            <? if($user->getId() != $this->session->userdata('id') ){ ?>
              <a href="#" class="btn btn-blue pull-right" onclick="st_friends.requestFriendship(<?=$user->getId()?>)" title="Request friendship"><i class="icon-plus"></i><i class="icon-user"></i></a>
            <? } ?>
          </div>             
          <div class="span1">
            <a href="#" id="butt_req" class="btn btn-red pull-right" onclick="showReqUsers();" title="Friends requests"><i class="icon-envelope"></i>&nbsp;<i id="number_requests"><?=sizeof($listFriendReq)?></i></a>
          </div>
        </div>
      </div>
      
      <br>
      <!-- END PICTURE + NAME -->
      
      <!-- BEGIN BARS -->
      <div class="row">
        <div class="span10 offset1">
          <div class="rounded-box">
            <!-- Content -->
            <label>Buddget Bar: <span id="budget_label"><?php if(isset($budget)){ echo $budget; } else { echo '0'; } ?></span>&nbsp;&euro;</label>
            <div class="progress progress-large" id="budget_bar">
            </div>
            <label>Time Bar:</label>
            <div class="progress progress-large" id="time_bar">
            </div>
            <a href="#" class="btn btn-blue" onclick="st_roadmap.showCountriesDetails();" title="Edit Roadmap" ><i class="icon-list"></i></a>
            &nbsp;&nbsp;
            <a href="#" class="btn btn-blue" onclick="st_roadmap.showPersonalBook();" title="Show Book" ><i class="icon-book"></i><i class="icon-user"></i></a>
          </div>                                                                                 
        </div>
      </div>
      <br>
      <!-- END BARS -->
      
      <!-- Begin detail of countries -->
      <div class="row" id="countriesDetails" style="display:none">
        <div class="span10 offset1">
          <div class="rounded-box">
            <p class="lead">
              Add countries to your roadmap.              
            </p>
            <ul class="unstyled">
              <li>
                <label for="budget">Budget:</label>
                <input type="number" name="budget" id="budget" onchange="st_roadmap.updateBudgetLabel(this.value);"/>
                <a class="btn btn-blue btn-status" href="#top" onclick="st_roadmap.saveRoadmap();">Save</a>
                <a class="btn btn-blue btn-status" href="#bottom" onclick="st_roadmap.addCountry();">Add Country</a>
              </li>
            </ul>
            <div id="countries" class="countries"></div>
          </div>
        </div>
      </div>
      <br>
      <!-- End detail of countries -->
      <div class="row">
        <div class="span10 offset1">
          <? if(isset($items_list)) {
              foreach($items_list as $item){?>
                
                <?switch ($item->getType()->getType()) {
                    case "COMMENT": $comment = $relation_list[$item->getId()];
                          if(isset($comment)){ ?>
                            <div class="rounded-box"  style="border: solid 1px;border-color: rgb(200,200,200);">
                              <div class="box-tip-header">
                                <div class="row">
                                  <div class="span5">
                                    <img src="<?=$comment->getIdUser()->getPicture()?>" style="height:30px;width:30px;"/>
                                    &nbsp;
                                    <a href="<?=site_url('user/detail/'.$comment->getIdUser()->getId())?>">
                                        @You
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
                                        @You
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
                                        @You
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
                          <? }
                          break;
                }
              }
            }
          ?>
        </div>
      </div>
      
      
      
      
      
      
      
    </div>
    
    <!-- DIV LIST FRIENDS REQUEST -->
    <? if(isset($listFriendReq) && !empty($listFriendReq)) { ?>
    <div id="div_req" class="rounded-box" style="display:none;">
       <ul class="unstyled">
          <? foreach ( $listFriendReq as $frreq ) { ?>
          <li id="li_<?=$frreq->getFromUser()->getId()?>">
          <img src="<?=$frreq->getFromUser()->getPicture()?>" class="picroadmap_rl"/> &nbsp;
          <?=$frreq->getFromUser()->getName().' '.$frreq->getFromUser()->getMiddleName().' '.$frreq->getFromUser()->getLastName()?>
          &nbsp;<a href="#" class="btn btn-mini btn-red" onclick="st_friends.acceptFriendship(<?=$frreq->getFromUser()->getId()?>)" title="Accept">Accept</a>
          &nbsp;<a href="#" class="btn btn-mini btn-red" onclick="st_friends.declineFriendship(<?=$frreq->getFromUser()->getId()?>)" title="Decline">Decline</a>
        </li>
      <? } ?>
      </ul>
    </div>
    <? } ?>
    <script>
      var showReqUsers = function(){
        $('#div_req').show();
        st_utils.setPosRelativeToBox('butt_req','div_req');                
      }
      /*
      var position = $("#butt_req").position();
      $("#div_req").css({
          "position":"absolute", 
          "top": position.top + 30 + "px",
          "left": position.left + "px"
           
      });*/
      //$("#div_req").text( "left: " + position.left + ", top: " + position.top );
    </script>
    <!-- END DIV LIST FRIENDS REQUEST -->

    <!-- Footer -->
    <footer>
      <?php include 'application/views/common/footer.php'; ?>
    </footer>
    <script>
      st_roadmap.init('<?php if(isset($object)){ echo $object; } ?>');
    </script>
<style>
.over_image{
  position:relative;
  display:inline-block;
        height:85px;
        width:85px;
        padding-right:10px; 
        padding-top:10px;

}
.images { 
        height:75px;
        width:75px; 
        border:0px; 
        /*margin-right:10px; 
        margin-top:10px;*/
}
.thumbs_style {
      background-color:white; 
      border-style:dashed;
      border-radius:20px; 
      padding:0px 10px 10px 20px; 
}
.thumbs_style_drop_here{
  position:relative;
      background-color:#fff;
      content:Drop Here;
      opacity:0.5;  
      border-style:dashed;
      border-color:#000000;
      border-radius:20px;
      min-height: 100px; 
      padding:0px 10px 10px 20px;
}
.progress-container {
    width: 300px;
}

#progress {
    background: navy;
    height: 100%;
    width: 0;
}

div._cont {
    position: absolute;
    color:red;
    z-index: 10;
    top:0;
    right:10px;
}

.close_pic {
    cursor: pointer;
    color: red;
    display: block;
    position: absolute;
    top: 0;
    right: 0;
    font-weight: bold;
}
#__text{
  font-size:200%;
  width: 100%;
  height: 100%;  
  z-index:10;
  position:absolute;
  top:40%;
  left:40%;
      
}

</style>
<script>
// Find all inputs on the DOM which are bound to a datalist via their list attribute.
/*(function(){
var inputs = document.querySelectorAll('input[list]');
for (var i = 0; i < inputs.length; i++) {
  // When the value of the input changes...
  inputs[i].addEventListener('change', function() {
    var optionFound = false,
      datalist = this.list;
    // Determine whether an option exists with the current value of the input.
    for (var j = 0; j < datalist.options.length; j++) {
        if (this.value == datalist.options[j].value) {
            optionFound = true;
            break;
        }
    }
    // use the setCustomValidity function of the Validation API
    // to provide an user feedback if the value does not exist in the datalist
    if (optionFound) {
      this.setCustomValidity('');
    } else {
      this.setCustomValidity('Please select a valid value.');
    }
  });
}
})();   */
</script>
</body>
</html>