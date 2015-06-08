<!DOCTYPE html>
<html>
  <!-- Head -->
  <?php include 'application/views/common/head.php'; ?>
  <body>

    <div class="container central">
      <div class="row">
        <!-- Navbar menu -->
        <?php include 'application/views/common/menu.php'; ?>
        <!-- Header -->
        <?php include 'application/views/common/header.php'; ?>
      </div>

      <? if(isset($error_message)){ ?>
        <p><?=$error_message?></p>
      <? } else { ?>
      <!-- BEGIN PICTURE + NAME -->
        <div class="row" ondragleave="st_comments.changeToDropHereBack();" ondragenter="st_comments.changeToDropHere();" ondragover="return false;" >
          <div class="span10 offset1 rounded-style">
            <div class="span1">
              <img src="<?=$u->getPicture()?>" class="picroadmap"/>
            </div>
            <div class="span6">
              <span class="nameroadmap"><?=$u->getName()?> <?=$u->getMiddleName()?> <?=$u->getLastName()?></span>
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
            <? if($u->getId() != $this->session->userdata('id') ){ ?>
              <a href="#" class="btn btn-blue pull-right" onclick="st_friends.requestFriendship(<?=$u->getId()?>)" title="Request friendship"><i class="icon-plus"></i><i class="icon-user"></i></a>
            <? } ?>
            </div>             
            <div class="span1">
              <a href="#" id="butt_req" class="btn btn-red pull-right" onclick="alert("send message")" title="Send message"><i class="icon-envelope"></i></a>
            </div>
          </div>
        </div>
        <br>
        <!-- END PICTURE + NAME -->
        <!-- PERSONAL INFO -->
        <div class="row">
          <div class="span10 offset1">
            <div class="rounded-box">
              <label><b>Description:</b></label>
              
                 <?=$u->getDescription()?>
              <br><br>
              <label><b>What he/she wants and what is she/he offering:</b></label>
                <?=$u->getWhat()?>              
            </div>                                                                                 
          </div>
        </div>
        <!-- PERSONAL INFO -->        
        <!-- BEGIN BARS -->
        <div class="row">
          <div class="span10 offset1">
            <div class="rounded-box">
              <!-- Content -->
              <label>Buddget Bar:</label>
              <div class="progress progress-large" id="budget_bar">
              </div>
              <label>Time Bar:</label>
              <div class="progress progress-large" id="time_bar">
              </div>
            </div>                                                                                 
          </div>
        </div>
        <br>
        <!-- END BARS -->
    <? } ?>
    </div>
    <!-- Footer -->
    <footer>
      <?php include 'application/views/common/footer.php'; ?>
    </footer>
    <script>
      st_roadmap.initView('<?php if(isset($object)){ echo $object; } ?>');
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
</body>
</html>