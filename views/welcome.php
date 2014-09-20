<!--Page Title-->
<section id="page-title">
  <div class="container">
    <div class="row mt20 pb20">
      
      <div class="col-sm-12 col-md-6">
        
        <h1 class="">Welcome to Troy Lake Personal Training!</h1>

        <p class="white lead">On my website, you will find everything you need to know about my Personal Training business and the awesome results we get.</p>
        <p class="white lead">You will also find some inspiring workout videos, some great training photo's and details on how to start your fitness journey with me. I will also be sending you exclusive newsletters and regular infotaining e-mails.</p>
        <p class="white lead">I will be adding more features and tools for you guys very shortly, so keep coming back. In the meantime, check out my top tips for advancing your workouts and improving your body.</p>
        
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

      <?php foreach ($data['tips'] as $i => $t): ?>
      <?php $n = ($i + 1); ?>
      
        <div class="col-sm-12 col-md-6">
        
          <div class="tip">
            <div class="logo">
              <img src="/img/small-trans-logo.png" alt="Troy Lake PT">
            </div>
            <h1>Tip #<?php echo $n;?></h1>
            <?php echo $pd->text($t->getTip());?>
          </div>
          
        </div>

      <?php endforeach; ?>
      
    </div><!--End Row-->   
  </div>
</section> 