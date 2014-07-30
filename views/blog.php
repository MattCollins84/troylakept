<? $pd = new Parsedown(); ?>
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
                <h3 class="gray"><!--<i class="fa fa-pencil fa-2x blue"></i> --><a href="/blog/<?=$post->getSEOTitle();?>/<?=$post->getBlogId();?>"><?=$post->getTitle();?></a></h3>
                <p class="blue"><small><em><i class="fa fa-user"></i> Posted By Troy&nbsp;&nbsp;&nbsp;<i class="fa fa-calendar"></i> <?=$post->getPostedDate()->getAsEnglishDate();?></em></small></p>
                <?=$pd->text($post->getIntro()); ?>
                <br />
                <a class="btn-main" href="/blog/<?=$post->getSEOTitle();?>/<?=$post->getBlogId();?>">Read more...</a>
              </div>
            </div>
          </article>
        <? endforeach; ?>
        
      </div><!--End Column1-->
      
      <!--Column2-->
      <!--Right Side Bar-->
      <div class="col-md-3">
        
        <p class="lead">History<p>
        
        <? foreach ($data['history'] as $history): ?>
          <p><a href="/blog/<?=$history['year'];?>/<?=$history['month'];?>"><i class="fa fa-angle-right"></i> <?=$data['months'][$history['month']];?> <?=$history['year'];?></a></p>
        <? endforeach; ?>
        
          
      </div><!--Side Bar-->
      
    </div><!--End Row-->
  </div>
</section>