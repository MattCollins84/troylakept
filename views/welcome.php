<!--Page Title-->
<section id="page-title">
  <div class="container">
    <div class="row mt20 pb20">
      
      <div class="col-sm-12 col-md-6">
        
        <h1 class="">Welcome to Troy Lake PT!</h1>

        <p class="white lead">On my website you will find everything you need to know about me, including some awesome workout videos and how to get in touch.
          I will also be sending you exclusive Newsletters showing you how to make the most of your workouts, along with some very Special offers!</p>
        <p class="white lead">I will be adding more features and tools for you guys very shortly so keep coming back!</p>
        <p class="white lead">In the meantime, check out my Top Tips for improving your fitness and your body.</p>
        <p class="white lead">- Troy</p>
        
      </div>

      <div class="col-sm-12 col-md-6 visible-lg">
        
        <img class="img-block" src="/img/troy-lake-logo-trans-420.png" alt="Troy Lake PT">
        
      </div>

    </div>
  </div>
</section>


<!--Content Section-->
<section class="content mt40">
  <div class="container">
    
    

    <div class="row">

      <? foreach ($data['tips'] as $i => $t): ?>
      <? $n = ($i + 1); ?>
      
        <div class="col-sm-12 col-md-6">
        
          <div class="tip">
            <div class="logo">
              <img src="/img/small-trans-logo.png" alt="Troy Lake PT">
            </div>
            <h1>Tip #<?=$n;?></h1>
            <?=$pd->text($t->getTip());?>
          </div>
          
        </div>

      <? endforeach; ?>
      
    </div><!--End Row-->   
  </div>
</section> 