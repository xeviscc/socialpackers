                    <div class="rounded-box">  
                      <div class="row">
                        <div class="span2">
                          <img src="<?=$project->getPicture()?>"/>         
                        </div>
                        <div class="span5">
                          <div class="row">
                            <div class="span2">
                              Country: <?=countryNameByCode($country_list, $project->getCountryCode())?>
                            </div>
                            <div class="span1">
                              <? if($project->getValidated()){ ?>
                                <b style="color:green;">Approved</b>
                              <? } else { ?>
                                <b style="color:red;">Pending approval</b>
                              <? }?>

                            </div>
                            <div class="span2">
                              <p>
                              <? if($project->getPublished()){ ?>
                                  <a class="btn" href="#" onclick="alert('Watch what you  do!!')">Unpublish</a>
                              <? } else { ?>
                                  <a class="btn" href="<?=site_url('project/publish/'.$project->getId())?>">Publish</a>
                              <? }?>
                              <a class="btn" href="#" onclick="$('#modify_project_<?=$project->getId()?>').toggle();$('#view_project_<?=$project->getId()?>').toggle();" >Edit</a>
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
                          <b>List of requests:</b>
                          <? foreach($userProject[$project->getId()] as $request) { ?>
                            <? $user = $request->getIdUser(); ?>
                            <div id="request_<?=$request->getId()?>">
                            <p>
                              <img src="<?=$user->getPicture()?>" style="height:25px; width:25px;"/>&nbsp;
                              <a href="<?=site_url('user/detail/'.$user->getId())?>">
                              <?=$user->getName()?>&nbsp;<?=$user->getMiddleName()?>&nbsp;<?=$user->getLastName()?>
                              </a>
                              <a href="#" onclick="st_project.acceptRequest(<?=$request->getId()?>);"><i class="icon-ok"></i></a>
                              <a href="#" onclick="st_project.declineRequest(<?=$request->getId()?>);"><i class="icon-remove"></i></a>
                            </p>
                            </div>
                          <? }?>
                        </div>
                      </div>
                    </div>