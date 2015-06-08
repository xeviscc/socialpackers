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
                            </div>
                            <div class="span2">
                              <p>
                              <a class="btn" href="<?=site_url('project/validate/'.$project->getId())?>">Validate</a>
                              <a class="btn" href="<?=site_url('project/denial/'.$project->getId())?>">Deny</a>
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

                        </div>
                      </div>
                    </div>