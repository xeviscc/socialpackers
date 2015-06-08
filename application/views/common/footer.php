<div class="container">
  <div class="row">
    <div class="span2">     
      <ul class="unstyled">
        <li class="li_first"><b>LAST NEWS</b></li>
        <li><a href="<?=site_url('blog')?>"><?=lang('footer.blog')?></a></li>
      </ul>
    </div>
    <div class="span2">     
      <ul class="unstyled">
        <li class="li_first"><b>SOCIALPACKERS</b></li>
        <li><a href="<?=site_url('about')?>"><?=lang('footer.about')?></a></li>
        <li><a href="<?=site_url('contact')?>"><?=lang('footer.contact')?></a></li>
      </ul>
    </div>
    <div class="span2">     
      <ul class="unstyled">
        <li class="li_first"><b>LEGAL</b></li>
        <li><a href="<?=site_url('terms')?>">Terms and Conditions</a></li>
        <li><a href="<?=site_url('privacy')?>">Privacy</a></li>
      </ul>
    </div>
    <div class="span2">     
      <ul class="unstyled">
        <li class="li_first"><b>COMMUNITY</b></li>
        <li><a href="<?=site_url('partners')?>">Partners</a></li>
      </ul>
    </div>
    <div class="span4">
      <ul class="unstyled">
        <li class="li_first"><b>NEWSLETTER</b></li>
        <li>
          <form method="post" accept-charset="utf-8" action="<?=site_url('landing/send')?>">
            <input value="" class="input-medium" name="newsletter_email" type="email" placeholder="<?=lang('landing.newsletter.placeholder')?>">
            <input type="submit" class="btn btn-success btn-primary landing_button" value="<?=lang('landing.newsletter.button')?>"/>
          </form>
        </li>
        <li class="pull-right">
          <form class="form-donate" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="QE39S8KBRU7CG">
            <input type="image" src="https://www.paypalobjects.com/en_GB/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
            <img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
          </form>
        </li>
        <li class="pull-right">&copy; 2013 SocialPackers</li>
      </ul>
    </div>
  </div>
</div>