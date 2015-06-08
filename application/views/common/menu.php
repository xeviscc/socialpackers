<div class="navbar navbar-inverse navbar-fixed-top navbar-absolute">
  <div class="navbar-inner">
    <div class="">
      <button type="button" class="btn btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <? if(isset($logged_in) && $logged_in===TRUE)  {?>
        <a class="brand" href="<?=site_url('main')?>"> 
      <? } else { ?> 
        <a class="brand" href="/"> 
      <? } ?>
        &nbsp;
        <span onmouseover="">
        <span class="social_logo">Social</span><span class="packers_logo">Packers</span>
        </span>
      </a>
      <div class="nav-collapse collapse" style="height: 0px;">
        <ul class="nav">
          <? if($logged_in) { ?>
            <? if(isset($menu_item) && $menu_item=='main') { echo '<li class="active">'; } else { echo '<li class="">'; } ?>
              <a href="<?=site_url('main')?>">News Feed</a>
            </li>
            <? if(isset($menu_item) && $menu_item=='roadmap') { echo '<li class="active">'; } else { echo '<li class="">'; } ?>
              <a href="<?=site_url('roadmap')?>"><?=lang('menu.roadmap')?></a>
            </li>
          <? } ?>
          <? if(isset($menu_item) && $menu_item=='tips') { echo '<li class="active">'; } else { echo '<li class="">'; } ?>
            <a href="<?=site_url('tips')?>"><?=lang('menu.tips')?></a>
          </li>
          <? if(isset($menu_item) && $menu_item=='project') { echo '<li class="active">'; } else { echo '<li class="">'; } ?>
            <a href="<?=site_url('project')?>"><?=lang('menu.projects')?></a>
          </li>
          <? if($logged_in) { ?>
            <? if(isset($menu_item) && $menu_item=='user') { echo '<li class="active">'; } else { echo '<li class="">'; } ?>
              <a href="<?=site_url('user')?>"><?=lang('menu.users')?></a>
            </li>
          <? } ?>
          <? if('xeviscc@gmail.com'==$this->session->userdata('email')) {?>
            <? if(isset($menu_item) && $menu_item=='proj_admin') { echo '<li class="active">'; } else { echo '<li class="">'; } ?>
              <a href="<?=site_url('project/admin')?>">Proj. Admin</a>
            </li>
          <? } ?>
        </ul>
        <ul class="nav pull-right">
          <? if($logged_in) { ?>
          
            <li>
              <a href="javascript:st_waypoint.show_map();" class="btn" onclick=""><i class="icon-screenshot"></i></a>
            </li>
         
            <? if(isset($menu_item) && $menu_item=='profile') { echo '<li class="active">'; } else { echo '<li class="">'; } ?>
              <a href="<?=site_url('profile')?>"><?=lang('menu.profile')?></a>
            </li>
          <? } ?>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?=lang('menu.language')?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a class="lang-en" href="/<?=$this->lang->switch_uri('en')?>">English</a></li>
              <li><a class="lang-ca" href="/<?=$this->lang->switch_uri('ca')?>">Català</a></li>
              <li><a class="lang-sp" href="/<?=$this->lang->switch_uri('es')?>">Castellano</a></li>
              <li><a class="lang-sp" href="/<?=$this->lang->switch_uri('fr')?>">Français</a></li>
            </ul>
          </li>
          <? if($logged_in) { ?> 
            <li><a href="<?=site_url('logout')?>"><?=lang('footer.logout')?></a></li>
          <? } else { ?>
            <li><a href="#myLogin" data-toggle="modal"><?=lang('footer.login')?></a></li>
            <li><a href="#myRegister" data-toggle="modal"><b><?=lang('footer.register')?></b></a></li>
          <? } ?>            
        </ul>
      </div>
    </div>
  </div>
</div>

            <div id="mapholder" class="mapholder" title="<?=lang('footer.mapholder.title')?>" onclick="st_waypoint.savePosition();"></div>

<!-- Modals -->
<!-- BEGIN LOGIN -->
<div id="myLogin" class="modal hide fade active" tabindex="-1" role="dialog" aria-labelledby="myLoginLabel" aria-hidden="true">
  <form name="login_form" method="post" action="<?=site_url('login/checklogin')?>">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button>
      <h3 id="myModalLabel"><?=lang('login.message')?></h3>
    </div>
    <div class="modal-body">
      <div class="body-login">
        <div class="body-login-pair">
          <label><?=lang('login.email.label')?></label>
          <input name="myusername" type="text" id="myusername">
        </div>
        <div class="body-login-pair">
          <label><?=lang('login.password.label')?></label>
          <input name="mypassword" type="password" id="mypassword">
        </div>
        <div class="body-login-forgot">
          <a href="<?=site_url('login/forgot_password')?>"><?=lang('login.forgot')?></a>
        </div>
      </div>
      <div class="button-login">
        <a href="#myRegister" data-dismiss="modal" aria-hidden="true" data-toggle="modal"><?=lang('login.button.register')?></a>
        &nbsp;
        <input class="btn btn-primary" type="submit" name="Submit" value="<?=lang('login.button.login')?>">
      </div>
        <br><br>
        <div style="height: 1px; background-color: grey; text-align: center">
          <span style="background-color: white; position: relative; top: -0.5em;">
            &nbsp;&nbsp;Or&nbsp;&nbsp;
          </span>
        </div>        
        <br>
      <div class="button-login-fb">
        <!-- Facebook button login-->
        <a href="#" class="facebookButtonLogin" onclick="Facebook_Login();"><span><?=lang('login.button.facebook')?> with Facebook</span></a>
        <!-- Facebook button login -->
      </div>
    </div>
  </form>
</div>
<!-- END LOGIN-->
<!-- BEGIN REGISTER -->
<div id="myRegister" class="modal hide fade active" tabindex="-1" role="dialog" aria-labelledby="myRegisterLabel" aria-hidden="true">
  <form name="registration_form" method="post" action="<?=site_url('register/submit')?>">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button>
      <h3 id="myModalLabel"><?=lang('register.message')?></h3>
    </div>
    <div class="modal-body">
      <div class="body-login">
        <div class="body-login-pair">
          <label><?=lang('login.email.label')?></label>
          <input name="email" type="text" id="email">
        </div>
        <div class="body-login-pair">
          <label><?=lang('login.password.label')?></label>
          <input name="password" type="password" id="password">
        </div>
      </div>
      <div class="button-login">
        <a href="#myLogin" data-dismiss="modal" aria-hidden="true" data-toggle="modal"><?=lang('login.button.login')?></a>
        &nbsp;
        <input class="btn btn-primary" type="submit" name="Submit" value="<?=lang('login.button.register')?>">
      </div>
      <!--
        <br><br>
        <div style="height: 1px; background-color: grey; text-align: center">
          <span style="background-color: white; position: relative; top: -0.5em;">
            &nbsp;&nbsp;Or&nbsp;&nbsp;
          </span>
        </div>        
        <br>
      <div class="button-login-fb">
        <!-- Facebook button login
        <a href="#" class="facebookButtonLogin" onclick="Facebook_Login();"><span><?=lang('login.button.facebook')?> with Facebook</span></a>
        <!-- Facebook button login 
      </div>                       -->
      
    </div>
  </form>
</div>
<!-- END REGISTER-->
