<?php $pd = new Parsedown(); ?>
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
        
        <article class="blog mb30">
          <div class="row">
            <div class="col-md-12">
              <h3 class="gray"><i class="fa fa-pencil fa-2x blue"></i> <?php echo $data['post']->getTitle();?></h3>
              <p class="blue"><small><em><i class="fa fa-user"></i> Posted By Troy <i class="fa fa-calendar"></i> <?php echo $data['post']->getPostedDate()->getAsEnglishDate();?></em></small></p>
              
              <?php echo $pd->text($data['post']->getBody());?>

              <div>
                <div class="fb-like" data-href="https://www.facebook.com/TroyLakePT" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
                <br />
                <a href="https://twitter.com/TroyLakePT" class="twitter-follow-button mt10" data-show-count="false" data-size="large" data-dnt="true">Follow @TroyLakePT</a>
                <a href="https://twitter.com/share" class="twitter-share-button" data-via="TroyLakePT" data-size="large" data-count="none">Share</a>

                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
              </div>
              
            </div>


          </div>
        </article>
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
      
      <!--Right Side Bar-->
      <div class="col-md-3">
        
        <p class="lead">History<p>
        
        <?php foreach ($data['history'] as $history): ?>
          <p><a href="/blog/<?php echo $history['year'];?>/<?php echo $history['month'];?>"><i class="fa fa-angle-right"></i> <?php echo $data['months'][$history['month']];?> <?php echo $history['year'];?></a></p>
        <?php endforeach; ?>
        
          
      </div><!--Side Bar-->
      
    </div><!--End Row-->
  </div>
</section>