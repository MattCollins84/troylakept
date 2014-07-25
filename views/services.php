<? $pd = new Parsedown(); ?>
<section id="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-12 title-white">
        <h2>Check out my full range of services below</h2>
      </div>
    </div>
  </div>
</section>

<? foreach ($data['services'] as $i => $s): ?>
<?
  //$icon = "<img class='mt40' src='/img/header-logo.png' alt='".$s->getName()."' />";
  $icon = "";
  if ($s->getIcon()) {

    $icons = explode(",", $s->getIcon());
    $bits = array();

    $icon = '<p class="text-center mt40">';
    foreach ($icons as $ic) {
      $c = (($i % 2)?"white ":"");
      $icon .= '<i class="red fa '.$c.$ic.' fa-8x"></i>';
    }
    $icon .= '</p>';

  }
?>
<? if ($i % 2): ?>
  <section class="red-content">

    <div class="container">
      
      <div class="row">
        
        <div class="col-md-3">
          <?=$icon;?>
        </div>
        <div class="col-md-9">
          <h3><span class="white"><?=$s->getName();?></span></h3>
          <p class="lead white"><?=$s->getHeadline();?></p>
          <?=$pd->text($s->getDescription());?>
          <br /><a class="btn-main" href="/contact">Find out more!</a>
        </div>
      </div>
      
    </div>

  </section>
<? else: ?>
  <section class="content">

    <div class="container">
      
      <div class="row mb50 mt10">
        <div class="col-md-9">
          <h3><span class="red"><?=$s->getName();?></span></h3>
          <p class="lead"><?=$s->getHeadline();?></p>
          <?=$pd->text($s->getDescription());?>
          <br />
          <a class="btn-main" href="/contact">Find out more!</a>
        </div>
        <div class="col-md-3">
          <?=$icon;?>
        </div>
      </div>
      
    </div>

  </section> 
<? endif ?>


<? endforeach; ?>