<!--Header Section-->
<section id="header">
  <div class="container">
    <div class="row mt80">
      <div class="col-md-6 col-sm-12">
        
        <img src="/img/troy-lake-logo-trans-420.png" class="image-responsive homepage-logo" alt="Troy Lake PT" />

      </div>

      <div class="col-md-6 col-sm-12">
        
        <div class="signup-container">
          
          <form role="form" class="home-form" id="signup"> 
            <h2>Get my free weekly newsletters!</h2>
            <div class="form-group">
              <input type="text" name="name" class="form-control input-lg" id="name" placeholder="Enter your name">
            </div>
            <div class="form-group">
              <input type="text" name="email" class="form-control input-lg" id="email" placeholder="And your email address">
            </div>
            <button type="submit" class="btn btn-lg btn-danger">Sign up now!</button>
          </form>

          <div id="signup-confirm" class="hidden">
            <h1 class="white">Thanks!</h1>
            <p class="lead white">Thanks for signing up to my newsletter!</p>
          </div>

        </div>

        <div class="slogan">

          <h1 class="text-center">STOP WISHING FOR IT.</h1>
          <h1 class="text-center">START WORKING FOR IT.</h1>

        </div>

      </div>
    </div>
  </div>
</section>


<!--About Section-->
<section id="content" class="pb40 pt20">
  <div class="container">
    
    <div class="row margin-30">
      <div class="col-md-3">
        <img src="/img/troy-headshot.jpg" class="img-block img-circle b-black mt30" />        
      </div>
      
      <div class="col-md-9">

        <h1 class="dark-gray pb20">About Troy Lake PT</h1>
        
        <? foreach ($data['about'] as $line): ?>
          <p class="gray"><?=$line;?></p>
        <? endforeach; ?>
        <p><a class="btn btn-danger btn-lg" href="#">Get In Touch</a></p>

      </div>
    </div>
    
  </div>
</section>

<!--Services Content-->
<section id="home-content">
  <div class="container">
    <div class="row">
      
      <a href="/services">
        <div class="col-sm-4 text-center home-box">
          <i class="fa fa-user fa-4x"></i>
          <h3>One 2 One Training</h3>
          <p>One on One training with Troy.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean a mauris dui. Nam eu risus neque, sed blandit ante. Integer eget massa.</p>
        </div>
      </a>
      
      <a href="/services">
        <div class="col-sm-4 text-center home-box">
          <i class="fa fa-users fa-4x"></i>
          <h3>Group Training</h3>
          <p>Take part in my specialised group training programmes, for maximum effect.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean a mauris dui. Nam eu risus neque, sed blandit ante. Integer eget massa.</p>
        </div>
      </a>
      
      <a href="/services">
        <div class="col-sm-4 text-center home-box">
          <i class="fa fa-heart fa-4x"></i>
          <h3>See All Services</h3>
          <p>My full range of services includes diet plans, HardCORE abs and Partner Training classes.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean a mauris dui. Nam eu risus neque, sed blandit ante. Integer eget massa.</p>
        </div>
      </a>
      
    </div>
  </div>
</section>

<? if ($data['videos']): ?>
<section id="content" class="pb40 pt20">
  <div class="container">
    
    <div class="row">
      
      <div class="col-sm-12 mb20">
        <h1 class="black">Check out some of my Videos</h1>
      </div>

      <? foreach ($data['videos'] as $v): ?>
      <div class="col-sm-6 col-md-4">
        <div class="media mb20">
          <a class="pull-left" target="_blank" href="<?=$v->getUrl();?>">
            <img class="media-object" src="<?=$v->getThumbnail();?>" id="detail-thumb">
          </a>
          <div class="media-body">
            <h5 class="media-heading black lead"><?=$v->getTitle();?></h5>
            <p><?=$v->getDescription();?></p>
          </div>
        </div>
      </div>
      <? endforeach; ?>
      
    </div>
    
  </div>
</section>
<? endif; ?>
<script>

$(document).ready(function() {

  $("form#signup").submit(function(e) {

    e.preventDefault();

    $.post("/signup", $("form#signup").serialize(), function(data) {
      
      try {
        data = JSON.parse(data);
      }

      catch (e) {
        data = {
          success: false
        };
      }

      if (data.success) {
        $("form#signup").addClass("hidden");
        $("#signup-confirm").removeClass("hidden");
      }

      else {
        alert(data.error);
      }

    });

  });

});

</script>