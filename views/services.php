<?php $pd = new Parsedown(); ?>
<section id="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-12 title-white">
        <h2><?php echo $data['service']->getName();?></h2>
      </div>
    </div>
  </div>
</section>

<section class="content">

  <div class="container">
    
    <div class="row mb50 mt10">
      <div class="col-md-9">
        <h3><span class="red"><?php echo $data['service']->getHeadline();?></span></h3>
        <?php echo $pd->text($data['service']->getDescription());?>
        <br />
        <a class="btn-main" href="/contact">Book now!</a>
      </div>
      <div class="col-md-3">
        <?php if ($data['service']->getIcon()): ?>
          <img class="mt20 img-responseive img-block" src="/uploads/<?php echo $data['service']->getIcon();?>" />
        <?php endif; ?>
      </div>
    </div>
    
  </div>

</section>