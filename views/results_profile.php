<!--Page Title-->
<section id="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-12 title-white">
        <h2><?=$data['result']->getName();?> - <?=$data['result']->getGoals();?></h2>
      </div>
    </div>
  </div>
</section>


<!--Portfolio Content-->
<section class="content mt40 mb40">
  <div class="container">
    
    <div class="row">
        
        <div class="col-sm-12 col-md-6 mb20">
          <img src="/uploads/<?=$data['result']->getImg();?>" class="img-responsive img-block" alt="<?=$data['result']->getName();?> - Before and after">
        </div>

        <div class="col-sm-12 col-md-6">
          <p class="lead red"><?=$data['result']->getIntro();?></p>
          <?=$pd->text($data['result']->getStory());?>
        </div>
        
    </div><!--End Row-->
          
  </div>
</section>
  