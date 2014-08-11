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
        
        <?php foreach ($data['posts'] as $post): ?>
          <article class="blog mb30">
            <div class="row">
              <div class="col-md-12">
                <h3 class="gray"><!--<i class="fa fa-pencil fa-2x blue"></i> --><a href="/blog/<?php echo $post->getSEOTitle();?>/<?php echo $post->getBlogId();?>"><?php echo $post->getTitle();?></a></h3>
                <p class="blue"><small><em><i class="fa fa-user"></i> Posted By Troy&nbsp;&nbsp;&nbsp;<i class="fa fa-calendar"></i> <?php echo $post->getPostedDate()->getAsEnglishDate();?></em></small></p>
                <?php echo $pd->text($post->getIntro()); ?>
                <br />
                <a class="btn-main" href="/blog/<?php echo $post->getSEOTitle();?>/<?php echo $post->getBlogId();?>">Read more...</a>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
        
      </div><!--End Column1-->
      
      <!--Column2-->
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