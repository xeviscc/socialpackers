<!DOCTYPE html>
<html>
  <!-- Head -->
  <?php include 'application/views/common/head.php'; ?>
  <body class="land_body">
  
    <div class="container land_image_1">
      <div class="row">
        <!-- Navbar menu -->
        <?php include 'application/views/common/menu.php'; ?>
        <!-- Header -->
        <?php include 'application/views/common/header.php'; ?>
      </div>
      <div class="row">

        <div id="home-body" class="bd">
          <h1>Travel.</h1>
				  <h2 class="sub-header">Start your adventure now.</h2>
          <div style="margin-bottom:2.5em">
            <p style="margin-top:2em">
              <a href="#myLogin" class="neon-cta" data-toggle="modal"><?=lang('login.message')?></a>
            </p>
          </div>
          <div id="smile-shortcuts">
  					<p class="subtext" style="margin-bottom:0.33em">
  						<a href="#friends" data-rapid_p="2">Friends</a> - Find friends while travelling.
  					</p>
  					<p class="subtext" style="margin-bottom:0.33em">
  						<a href="#social" data-rapid_p="3">Social</a> - Collaborate in social projects.
  					</p>
  					<p class="subtext"  style="margin-top:0.33em;">
  					 	<a href="#mobile" data-rapid_p="4">Mobile</a> - Find secret places near you! 
  					</p>
  				</div>
					<p class="subtext" style="margin-top:1.5em;">
  					<a href="#myRegister" data-toggle="modal"><b><?=lang('footer.register')?></b></a>
  				</p>
  			</div>
      </div>
    </div>
    <div id="friends" class="container land_image_2">
                  
      <div class="row">
        <div id="home-body" class="bd" style="color:#4c931e;">
          <h1>Friends.</h1>
				  <h2 class="sub-header">Meet SocialPackers abroad.</h2>
          <div style="margin-bottom:2.5em">
            <p style="margin-top:2em">
              <a href="#myLogin" class="neon-cta" data-toggle="modal"><?=lang('login.message')?></a>
            </p>
          </div>
          <div id="smile-shortcuts">
  					<p class="subtext" style="margin-bottom:0.33em">
  						Join our growing community.
  					</p>
  					<p class="subtext" style="margin-bottom:0.33em">
  						Roadmap - Plan your trip around the world.
  					</p>
  				</div>
  			</div>
      </div>
      
      
    </div>
    <div id="social" class="container land_image_3">
      <div class="row">
        <div id="home-body" class="bd">
          <h1>Social.</h1>
				  <h2 class="sub-header">Make things happen.</h2>
          <div style="margin-bottom:2.5em">
            <p style="margin-top:2em">
              <a href="#myLogin" class="neon-cta" data-toggle="modal"><?=lang('login.message')?></a>
            </p>
          </div>
          <div id="smile-shortcuts">
  					<p class="subtext" style="margin-bottom:0.33em">
  						<a href="<?=site_url('project')?>" data-rapid_p="2">Projects</a> - Start digging and find your project.
  					</p>
  					<p class="subtext" style="margin-bottom:0.33em">
  						<a href="<?=site_url('project?create_landing')?>" data-rapid_p="3">Create</a> - Help your community to grow.
  					</p>
  				</div>
  			</div>
      </div>
    </div>
    <div id="mobile" class="container land_image_4">
      <div class="row">
        <div id="home-body" class="bd">
          <h1>Mobile.</h1>
				  <h2 class="sub-header">Get local hints wherever you are. (Coming soon)</h2>
          <div style="margin-bottom:2.5em">
            <p style="margin-top:2em">
              <!--<a href="#myLogin" class="neon-cta" data-toggle="modal"><?=lang('login.message')?></a>-->
            </p>
          </div>
          <div id="smile-shortcuts">
  					<p class="subtext" style="margin-bottom:0.33em;">
  						<a href="<?=site_url('tips')?>" data-rapid_p="2">Tips</a> - Find that secret place.
  					</p>
  					<p class="subtext" style="margin-bottom:0.33em;">
              Connect from everywhere and take the adventure with you.  						
  					</p>
  				</div>
  			</div>
      </div>
    </div>
    <!-- Footer -->
    <footer class="footer">
      <?php include 'application/views/common/footer.php'; ?>
    </footer>
    <script>             
      
      $('a[href="#friends"]').bind('click', function(e) {
         e.preventDefault();
         $('html, body').animate({ scrollTop: $(this.hash).offset().top }, 1000);
      
         // edit: Opera requires the "html" elm. animated
      });
      $('a[href="#social"]').bind('click', function(e) {
         e.preventDefault();
         $('html, body').animate({ scrollTop: $(this.hash).offset().top }, 1000);
      
         // edit: Opera requires the "html" elm. animated
      });
      $('a[href="#mobile"]').bind('click', function(e) {
         e.preventDefault();
         $('html, body').animate({ scrollTop: $(this.hash).offset().top }, 1000);
      
         // edit: Opera requires the "html" elm. animated
      });
    </script>
  </body>
</html>