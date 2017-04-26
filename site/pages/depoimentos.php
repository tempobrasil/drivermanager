<?
include('inc.header.php');
?>

  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper row2">
    <div id="breadcrumb" class="hoc clear">
      <!-- ################################################################################################ -->
      <ul>
        <li><a href="<?= GetLink('site/home')?>">Home</a></li>
        <li><a href="<?= GetLink('site/depoimentos')?>">Depoimentos</a></li>

      </ul>
      <!-- ################################################################################################ -->
    </div>
  </div>


  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper row3">
    <main class="hoc container clear">
      <!-- main body -->
      <!-- ################################################################################################ -->
      <div id="comments" class="content">
        <!-- ################################################################################################ -->
        <h1><i class="fa fa-like" aria-hidden="true"></i> Convênios</h1>

          <ul>
            <li>
              <article>
                <header>
                  <figure class="avatar"><img src="<?= get_config('SITE_URL')?>site/images/demo/avatar.png" alt="Template Demo Image"></figure>
                  <address>
                    By <a href="http://www.os-templates.com/free-website-templates">A Name</a>
                  </address>
                  <time datetime="2045-04-06T08:15+00:00">Friday, 6<sup>th</sup> April 2045 @08:15:00</time>
                </header>
                <div class="comcont">
                  <p>This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.</p>
                </div>
              </article>
            </li>
            <li>
              <article>
                <header>
                  <figure class="avatar"><img src="<?= get_config('SITE_URL')?>site/images/demo/avatar.png" alt="Template Demo Image"></figure>
                  <address>
                    By <a href="http://www.os-templates.com/free-website-templates">A Name</a>
                  </address>
                  <time datetime="2045-04-06T08:15+00:00">Friday, 6<sup>th</sup> April 2045 @08:15:00</time>
                </header>
                <div class="comcont">
                  <p>This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.</p>
                </div>
              </article>
            </li>
            <li>
              <article>
                <header>
                  <figure class="avatar"><img src="<?= get_config('SITE_URL')?>site/images/demo/avatar.png" alt="Template Demo Image"></figure>
                  <address>
                    By <a href="http://www.os-templates.com/free-website-templates">A Name</a>
                  </address>
                  <time datetime="2045-04-06T08:15+00:00">Friday, 6<sup>th</sup> April 2045 @08:15:00</time>
                </header>
                <div class="comcont">
                  <p>This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.</p>
                </div>
              </article>
            </li>
          </ul>

        <!-- ################################################################################################ -->
      </div>
      <!-- ################################################################################################ -->
      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>
<?
include('inc.footer.php');
?>