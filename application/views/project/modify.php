                <!-- MODIFY PROJECT -->
                <div id="modify_project_<?=$project->getId()?>" class="row" style="display:none;">
                  <div class="span9 rounded-box">
                    <!--<p class="lead"><?=lang('project.label')?></p>-->
                    <form id="project_form_<?=$project->getId()?>" name="project_form" method="post" action="<?=site_url('project/modify')?>" enctype="multipart/form-data">
                      <!--<ul class="unstyled">-->
                      <div class="row">
                        <div class="span6">
                          <div class="row">
                            <div class="span3">
                              <label for="name"><?=lang('project.name.label')?></label>
                              <input type="text" name="name" value="<?=$project->getName()?>"/>
                              <input type="hidden" name="id" value="<?=$project->getId()?>"/>
                            </div>
                            <div class="span2">
                              <label for="country">Country</label>
                              <!--
                              <input class="input-small" type="text" name="country" list="country_dl" value="<?=countryNameByCode($country_list, $project->getCountryCode())?>"/>
                              -->
                              <input class="input-small" type="text" id="m_countries_list" name="country_name" value="<?=countryNameByCode($country_list, $project->getCountryCode())?>">
                              <input type="hidden" id="m_country_code" name="country" value="<?=$project->getCountryCode()?>">
                              <script>
                                st_utils.autocompleteCountry('m_countries_list', 'm_country_code', list);
                              </script>
                            </div>
                            <div class="span6">
                              <label for="description"><?=lang('project.desc.label')?></label>
                              <textarea class="span5" name="description"cols="80" rows="6" ><?=$project->getDescription()?></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="span3">
                          <div class="row">
                            <div class="span3">
                              <label for="picture"><?=lang('project.pic.label')?></label>
                              <img src="<?=$project->getPicture()?>" />
                              <input type="file" name="picture"/>
                            </div>
                            <div class="span2">
                              <br>
                              <br>
                              <input class="btn" type="submit" value="Modify">
                              <input class="btn" type="button" onclick="st_project.addTask('tasks_<?=$project->getId()?>');$('#floating_buttons_<?=$project->getId()?>').show();" value="<?=lang('project.button.addtask')?>">
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--</ul>-->
                      <div class="row">                      
                        <div class="span8" id="tasks_<?=$project->getId()?>">
                          <!-- ITERATE TASKS FOR PROJECT -->
                          <? foreach($tasks[$project->getId()] as $task) { ?>
                            <? $idDiv = "task-".$task->getId(); ?>
                            <!-- HIDDEN TASK -->
                            <div id="<?=$idDiv?>_hidden" class="taskHidden">
                              <ul class="unstyled">
                                <li>
                                  <button type="button" class="close" title="Delete Task" onclick="st_project.deleteTask('<?=$idDiv?>')"><i class="icon-remove"></i></button>
                                  <button type="button" class="close andor" title="Show Task" onclick="st_project.showTask('<?=$idDiv?>')"><i class="icon-chevron-down"></i></button>
                                </li>
                                <li>
                                  <label id="<?=$idDiv?>_hidden_name"><strong>Task: </strong><?=$task->getName()?></label>
                                </li>
                              </ul> 
                            </div>         
                            <!-- COMPLET TASK -->
                            <div id="<?=$idDiv?>" class="row task"> 
                              <ul class="unstyled">
                                <li>
                                  <button type="button" class="close" title="Delete Task" onclick="st_project.deleteTask('<?=$idDiv?>')"><i class="icon-remove"></i></button>
                                  <button type="button" class="close andor" title="Hide Task" onclick="st_project.hideTask('<?=$idDiv?>')"><i class="icon-chevron-up"></i></button>
                                </li>
                                <li class="span3">
                                  <label for="<?=$idDiv?>_name">Task Name:</label>
                                  <input type="text" class="input-large" name="<?=$idDiv?>_name" oninput="st_project.changeHidden(this.value,'<?=$idDiv?>');" value="<?=$task->getName()?>">
                                  <input type="hidden" name="<?=$idDiv?>_id" value="<?=$task->getId()?>">
                                </li>    
                                <li class="span2">
                                  <label for="<?=$idDiv?>_start_date">Start date:</label>
                                  <input type="date" class="input-medium" name="<?=$idDiv?>_start-date" value="<?=$task->getStartDate()->format("Y-m-d")?>">
                                </li>
                                <li class="span2">
                                  <label for="<?=$idDiv?>_end_date">End date:</label>
                                  <input type="date" class="input-medium" name="<?=$idDiv?>_end-date" value="<?=$task->getEndDate()->format("Y-m-d")?>">
                                </li>
                                <li class="span3">
                                  <label for="<?=$idDiv?>_schedule">Schedule:</label>
                                  <input type="time" class="input-small" name="<?=$idDiv?>_start-schedule" value="<?=$task->getStartSchedule()?>">
                                  <input type="time" class="input-small" name="<?=$idDiv?>_end-schedule" value="<?=$task->getEndSchedule()?>">
                                </li>
                                <li class="span2">
                                  <label for="<?=$idDiv?>_num_users_needed">Num Users Needed:</label>
                                  <input type="number" class="input-small" name="<?=$idDiv?>_num-users-needed" min=1 required value="<?=$task->getNumUsersNeeded()?>">
                                </li>
                                <li class="span6">
                                  <label for="<?=$idDiv?>_description">Description:</label>
                                  <textarea class="span6" name="<?=$idDiv?>_description" cols="80" rows="4"><?=$task->getDescription()?></textarea>
                                </li>
                                <li class="span3">
                                  <label for="<?=$idDiv?>_reward">Reward:</label>
                                  <textarea class="span3" name="<?=$idDiv?>_reward" cols="80" rows="4"><?=$task->getReward()?></textarea>
                                </li>
                                <li class="span3">
                                  <label for="<?=$idDiv?>_requeriments">Requeriments:</label>
                                  <textarea class="span3" name="<?=$idDiv?>_requeriments" cols="80" rows="4"><?=$task->getRequeriments()?></textarea>
                                </li>
                              </ul>
                            </div>
                          <? } ?>
                        </div>
                      </div>
                      <!-- END ITERATE TASKS FOR PROJECT -->
                    </form>
                    <div id="floating_buttons_<?=$project->getId()?>" class="span1" style="position: relative; bottom:20px; left: 80%; display:none;">
                      <input class="btn" type="submit" value="Modify" form="project_form_<?=$project->getId()?>">
                      <br>
                      <br>
                      <input class="btn" type="submit" onclick="st_project.addTask('tasks_<?=$project->getId()?>');" value="<?=lang('project.button.addtask')?>">
                    </div>
                  </div>
                </div>
                <!-- END CREATE NEW PROJECT -->
                      