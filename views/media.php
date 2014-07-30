<? $pd = new Parsedown(); ?>
<section id="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-12 title-white">
        <h2>Troy Lake PT in the news...</h2>
      </div>
    </div>
  </div>
</section>



  <section class="content">

    <div class="container">
      
      <div class="row mb20">
        <? foreach ($data['media'] as $i => $s): ?>
          <article class="blog mb30">
            <div class="row">
              <div class="col-md-12">
                <h3 class="gray"><a href="<?=$s->getUrl();?>" target="_blank"><?=$s->getTitle();?></a></h3>
                <?=$pd->text($s->getIntro()); ?>
                <br />
                <a class="btn-main" href="<?=$s->getUrl();?>">Read more...</a>
              </div>
            </div>
          </article>
        <? endforeach; ?>
      </div>
      
    </div>
    
  </section>