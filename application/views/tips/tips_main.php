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
    <!-- Header -->
    <?php include 'application/views/common/header.php'; ?>
         
    <div class="container">
      <div class="row">
        <?php include 'application/views/common/menu.php'; ?>
      </div>
      <div class="row">
        <div class="span10 offset1">
          <div class="tabbable">
            <ul class="nav nav-tabs">
              <li class="active"><a id="#tab_search_title" href="#tab_search" data-toggle="tab"><b>Search/Publish</b></a></li>
              <li><a id="tab_backpack_title" href="#tab_backpack" data-toggle="tab">Backpack</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_search">
                <!-- SERACH BOX TIP -->
                <div class="row">
                  <div class="span10 rounded-style">
                    <form name="tip_create_form" method="post" action="<?=site_url('tips/create')?>" enctype="multipart/form-data">
                      <ul class="tips unstyled">
                        <li class="span5">
                          <textarea class="span5" name="tip" cols="80" rows="3" placeholder="<?=lang('tips.publish.text.placeholder')?>" required autofocus></textarea>
                          <a class="btn btn-blue" href="<?=site_url('tips')?>">Clear Search</a>
                        </li>
                        <li class="span2">
                        <!--
                          <input type="text" list="countries_dl" name="country"  id="country"  placeholder="<?=lang('tips.publish.country.placeholder')?>"
                          onblur="st_utils.getCountryCodeTo('country','country_code');" required>
                          -->
                          <input class="input-small" type="text" id="countries_list" name="country_name" placeholder="<?=lang('tips.publish.country.placeholder')?>" required>
                          <input type="hidden" id="country_code" name="country_code">
                          <input type="text" name="categories" placeholder="<?=lang('tips.publish.cat.placeholder')?>" required>
                          <button class="btn btn-blue" type="submit"><?=lang('tips.publish.button')?></button>
                          - or -
                          <button class="btn btn-blue" type="submit" formnovalidate  formaction="<?=site_url('tips/filter')?>"><?=lang('tips.filter.button')?></button>
                        </li>
                        <li class="span2 text-clarify">
                            <p>- To publish: Write a tip, choose a country and type a category. Push Publish<br>- To search: Choose a country and/or type a category. Push Filter</p>
                        </li>           
                      </ul>
                    </form>
                  </div>
                </div>
                <br>
                <script>
                  st_utils.autocompleteCountry('countries_list', 'country_code', list);
                </script>
                <!-- END SERACH BOX TIP -->
                
                <!-- SEARCH TIPS LIST --> 
                <div class="row">
                  <div class="span10" id="search_tip_cont" style="overflow:hidden;">
                    <? foreach ( $tip_list as $tip ) { ?>
                      <div class="span2 rounded-box item_tip">
                        <div class="box-tip">
                          <div class="row">
                            <div class="span2 box-tip-header">
                              <div class="row">
                                <div class="span1"><a href="<?=site_url('user/detail/'.$tip->getIdUser()->getId())?>">@<?=$tip->getIdUser()->getName()?></a></div>
                                
                                <div class="span1"></div>
                                <div class="span2 pull-right"><?=$tip->getPublicationDate()->format("d/m/Y")?></div>
                                <div class="span2"><?=countryNameByCode($country_list, $tip->getCountryCode()->getCode())?></div>
                              </div>
                            </div>
                          </div>
                          <div class="row box-tip-body">
                            <div class="span2"><br><?=$tip->getTip()?></div>
                          </div>
                          <div class="row box-tip-footer">
                            <div class="span1 offset1">
                              Categories: 
                              <? $tokens = explode(";",$tip->getCategories());
                              foreach ( $tokens as $cat ) { ?>
                                <a href="<?=site_url('tips/filter/?cat='.$cat)?>"><span class="category"><?=$cat?></span></a>
                              <? } ?>
                            </div>
                            
                          </div>
                          <div class="box-tip-buttons">
                            <br>
                            <a class="btn btn-primary btn-small" href="<?=site_url('tips/like/'.$tip->getId())?>">Like</a> <a class="btn btn-small" href="<?=site_url('tips/favorite/'.$tip->getId())?>">Fovourite</a>
                          </div>
                        </div>
                      </div>
                    <? } ?>
                  </div>
                </div>
                <!-- END SEARCH TIPS LIST -->
              </div>
              <div class="tab-pane" id="tab_backpack" style="overflow:hidden;">
                <!-- BACKPACK TIPS LIST -->
                <div class="row">
                  <div class="span10" id="backpack_tip_cont">
                    <? if(empty($backpack_list)){ ?>
                      <p>Your backpack is empty</p>
                    <? } ?> 
                    <? foreach ( $backpack_list as $tip ) { ?>
                      <div class="span2 rounded-box item_tip">
                        <div class="box-tip">
                          <div class="row">
                            <div class="span2 box-tip-header">
                              <div class="row">
                                <div class="span1"><a href="<?=site_url('user/detail/'.$tip->getIdUser()->getId())?>">@<?=$tip->getIdUser()->getName()?></a></div>
                                <div class="pull-right"><b><a href="<?=site_url('tips/delete/'.$tip->getId())?>" style="color:red;" title="Delete">X</a>&nbsp;</b></div>
                                <div class="span2 pull-right"><?=$tip->getPublicationDate()->format("d/m/Y")?></div>
                                <div class="span2"><?=countryNameByCode($country_list, $tip->getCountryCode()->getCode())?></div>
                              </div>
                            </div>
                          </div>
                          <div class="row box-tip-body">
                            <div class="span2"><br><?=$tip->getTip()?></div>
                          </div>
                          <div class="row box-tip-footer">
                            <div class="span1 offset1">
                              Categories: 
                              <? $tokens = explode(";",$tip->getCategories());
                              foreach ( $tokens as $cat ) { ?>
                                <a href="<?=site_url('tips/filter/?cat='.$cat)?>"><span class="category"><?=$cat?></span></a>
                              <? } ?>
                            </div>
                            
                          </div>
                        </div>
                      </div>
       
                    <? } ?>
                  </div>
                </div>
                <!-- END BACKPACK TIPS LIST -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Filter -->
    <!--
    <div class="row first">
    <div class="span2">
      <form name="tip_filter_form" method="post" action="<?=site_url('tips/filter')?>" enctype="multipart/form-data">
      <ul class="unstyled">
        <li>
          <label><strong><?=lang('tips.filter.label')?></strong></label>
        </li>
        <li>
          <label for="country"><?=lang('tips.filter.country.label')?></label>
          <input type="text" list="countries_dl" name="country">
        </li>                                 
        <li>
          <label for="skills"><?=lang('tips.filter.cat.label')?></label>
          <input type="text" name="categories">
        </li>
        <li>
          <label for="filter"></label>
          <input type="submit" class="btn" name="Filter" value="<?=lang('tips.filter.button')?>">
        </li>
      </ul>
      </form>
    </div>
    -->

    <!-- Footer -->
    <footer>
      <?php include 'application/views/common/footer.php'; ?>
    </footer>
  </body>
</html>

