<?php $pd = new Parsedown(); ?>
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
        <?php foreach ($data['media'] as $i => $s): ?>
          <article class="blog mb30">
            <div class="row">
              <div class="col-md-12">
                <h3 class="gray"><a href="<?php echo $s->getUrl();?>" target="_blank"><?php echo $s->getTitle();?></a></h3>
                <?php echo $pd->text($s->getIntro()); ?>
                <br />
                <a class="btn-main" href="<?php echo $s->getUrl();?>">Read more...</a>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
      
    </div>
    
  </section>