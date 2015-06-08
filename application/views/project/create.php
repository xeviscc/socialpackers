                <!-- CREATE NEW PROJECT -->
                <div class="row">
                  <div class="span9 rounded-box">
                    <form id="project_form" name="project_form" method="post" action="<?=site_url('project/create')?>" enctype="multipart/form-data">
                      <ul class="unstyled">
                        <li class="span3">
                          <label for="name"><?=lang('project.name.label')?></label>
                          <input type="text" name="name" placeholder="<?=lang('project.name.placeholder')?>" required autofocus/>
                        </li>
                        <li class="span2">
                          <label for="country">Country</label>
                          <input class="input-small" type="text" id="create_countries_list" name="country_name" />
                          <input type="hidden" id="create_country_code" name="country_code" />
                        </li>
                        <li class="span3">
                          <label for="picture"><?=lang('project.pic.label')?></label>
                          <input type="file" name="picture"/>
                        </li>
                        <li class="span6">
                          <label for="description"><?=lang('project.desc.label')?></label>
                          <textarea class="span5" name="description"cols="80" rows="6" placeholder="<?=lang('project.desc.placeholder')?>"></textarea>
                        </li>
                        <li class="span2">
                          <br>
                          <br>
                          <input class="btn" type="submit" value="<?=lang('project.button.create')?>">
                          <input class="btn" type="submit" onclick="st_project.addTask();$('#floating_buttons').show();" value="<?=lang('project.button.addtask')?>">
                        </li>
                      </ul>
                      <div class="span8" id="tasks"></div>
                    </form>
                    <div id="floating_buttons" class="span1" style="position: relative; bottom:20px; left: 80%; display:none;">
                      <input class="btn" type="submit" value="<?=lang('project.button.create')?>" form="project_form">
                      <br>
                      <br>
                      <input class="btn" type="submit" onclick="st_project.addTask();" value="<?=lang('project.button.addtask')?>">
                    </div>

                  </div>
                </div>
                <script>
                  st_utils.autocompleteCountry('create_countries_list', 'create_country_code', list);
                </script>
                <!-- END CREATE NEW PROJECT -->
                      