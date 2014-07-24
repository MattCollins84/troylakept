<!--Page Title-->
<section id="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-12 title-white">
        <h2>Blog</h2>
      </div>
    </div>
  </div>
</section>

<!--Content Section-->
<section class="content mt20">
  <div class="container">
      
    <div class="row">
      
      <!--Column1-->
      <div class="col-md-9">
        
        <? foreach ($data['posts'] as $post): ?>
          <article class="blog mb30">
            <div class="row">
              <div class="col-md-12">
                <h3 class="gray"><i class="fa fa-pencil fa-2x blue"></i> <?=$post->getTitle();?></h3>
                <p class="blue"><small><em><i class="fa fa-user"></i> Posted By Troy <i class="fa fa-calendar"></i> <?=$post->getPostedDate()->getAsEnglishDate();?></em></small></p>
                <p class="gray"><?=$post->getIntro();?></p>
                <br />
                <a class="btn-main" href="/blog/<?=$post->getSEOTitle();?>/<?=$post->getBlogId();?>">More</a>
              </div>
            </div>
          </article>
        <? endforeach; ?>
        <!--
        <div class="pagination">
          <ul class="list-inline">
            <li><a href="#">Prev</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">Next</a></li>
          </ul>
        </div>-->
        
      </div><!--End Column1-->
      
      <!--Column2-->
      <!--Right Side Bar-->
      <div class="col-md-3">
        
        <form class="margin-20">
          <input type="text" class="col-xs-12" placeholder="Search">
        </form>
      
        <p class="lead">Side Bar Title<p>
          <p class="gray">Lorem <a href="#">ipsum dolor</a> sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <br />
        
        <p class="lead">Instagram</p>
        <!--Visit "Snapwidget.com" - Use Settings: 80px wide for images, 3x2 for the grid, and FadeOut on Hover-->
        <!-- SnapWidget -->
        <div style="height:200px;">
         <iframe src="http://snapwidget.com/in/?u=amVmZmNvcmV5fGlufDgwfDN8Mnx8bm98NXxmYWRlT3V0"></iframe>
        </div>
        
        
        <p class="lead">Links</p>
          <ul class="unstyled blog-links">
            <li><a href="http://www.themearmada.com"><i class="fa fa-angle-right"></i> Theme Armada</a></li>
            <li><a href="http://www.twitter.com/themearmada"><i class="fa fa-angle-right"></i> Twitter Link</a></li>
            <li><a href="#"><i class="fa fa-angle-right"></i> Insert Link Three</a></li>
            <li><a href="#"><i class="fa fa-angle-right"></i> Insert Link Four</a></li>
          </ul>
        <br />
        
          
      </div><!--Side Bar-->
      
    </div><!--End Row-->
  </div>
</section>