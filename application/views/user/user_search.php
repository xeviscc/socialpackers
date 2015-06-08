                <div class="row">
                  <div class="span9 rounded-style">
                    <form name="project_filter_form" method="post" action="<?=site_url('user/filter')?>" enctype="multipart/form-data">      
                      <ul class="unstyled">
                        <li class="span5">
                          <label for="full_name">Name</label>
                          <input type="text" class="input-xlarge" name="full_name" >
                        </li>
                        <li class="span3">
                          <label for="country">Actual country:</label>
                          <!--<input class="input-small" type="text" list="countries_dl" name="country">-->
                          <input class="input-medium" type="text" id="countries_list" name="country_name">
                          <input type="hidden" id="country_code" name="country">
                          <input class="btn btn-blue btn-status" type="submit" name="Filter" value="Filter">
                        </li>
                      </ul>
                    </form>        
                  </div>
                </div>
                <script>
                  st_utils.autocompleteCountry('countries_list', 'country_code', list);
                </script>