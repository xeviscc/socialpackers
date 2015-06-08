                <div class="row">
                  <div class="span9 rounded-style">
                    <form name="project_filter_form" method="post" action="<?=site_url('project/filter')?>" enctype="multipart/form-data">      
                      <ul class="unstyled">
                        <li class="span3">
                          <label for="start_date"><?=lang('project.sch.start')?></label>
                          <input type="date" name="start_date" id="search_start_date" placeholder="dd/MM/yyyy" >
                        </li>
                        <li class="span3">
                          <label for="end_date"><?=lang('project.sch.end')?></label>
                          <input type="date" name="end_date" id="search_end_date" placeholder="dd/MM/yyyy" >
                        </li>
                        <li class="span2">
                          <label for="country"><?=lang('project.sch.country')?></label>
                          <!--<input class="input-small" type="text" list="countries_dl" name="country">-->
                          <input class="input-small" type="text" id="countries_list" name="country_name">
                          <input type="hidden" id="country_code" name="country">
                          <input class="btn btn-blue btn-status" type="submit" name="Filter" value="<?=lang('project.sch.filter')?>">
                        </li>
                      </ul>
                    </form>        
                  </div>
                </div>
                <script>
                  st_utils.autocompleteCountry('countries_list', 'country_code', list);
                  //Datepicker for non HMTL5 compatible browsers
                  if(!Modernizr.inputtypes.date){
                    $('#search_start_date').attr("placeholder", "yyyy-mm-dd");
                    $('#search_start_date').datepicker({dateFormat: "yy-mm-dd" });
                    $('#search_end_date').attr("placeholder", "yyyy-mm-dd"); 
                    $('#search_end_date').datepicker({dateFormat: "yy-mm-dd" });
                  }
                </script>