<!--Header Section-->
<section id="header">
  <div class="container">
    <div class="row mt80-lg">
      <div class="col-md-6 col-sm-12">
        
        <img src="/img/troy-lake-logo-trans-420.png" class="image-responsive homepage-logo" alt="Troy Lake PT" />

        <div class="slogan">

          <h1 class="text-center">STOP WISHING FOR IT.</h1>
          <h1 class="text-center">START WORKING FOR IT.</h1>

        </div>



      </div>

      <div class="col-md-6 col-sm-12">
        
        <div class="signup-container">
          
          <form role="form" class="home-form" id="signup"> 
            <h1 class="mt0">GET TROYS TOP TIPS!</h1>
            <ul class="list-unstyled">
              <li class="check"><i class="fa fa-check"> </i> ADVANCE YOUR WORKOUTS</li>
              <li class="check"><i class="fa fa-check"> </i> TIPS AND TRICKS TO IMPROVE YOUR DIET</li>
              <li class="check"><i class="fa fa-check"> </i> REGULAR INFORMATIVE AND ENTERTAINING EMAILS</li>
              <li class="check"><i class="fa fa-check"> </i> MONTHLY NEWSLETTERS</li>
              <li class="check"><i class="fa fa-check"> </i> ACCESS TO EXCLUSIVE TRAINING VIDEOS</li>
            </ul>
            <div class="form-group">
              <input type="text" name="name" class="form-control input-lg" id="name" placeholder="Enter your name">
            </div>
            <div class="form-group">
              <input type="text" name="email" class="form-control input-lg" id="email" placeholder="And your email address">
            </div>
            <button type="submit" class="btn btn-lg btn-danger">Sign up now!</button>

          </form>

        </div>

      </div>
    </div>
  </div>
</section>

<!--About Section-->
<section id="content" class="pb10 pt20">
  <div class="container">
    
    <div class="row margin-30">
      <div class="col-md-3">
        <img src="/img/troy-about.jpg" class="img-block img-circle b-black mt30" />        
      </div>
      
      <div class="col-md-9">

        <h1 class="dark-gray pb20">About Troy Lake Personal Training</h1>
        
        <?php echo $pd->text($data['about']);?>
        <br />
        <p><a class="btn-main mt10" href="/contact">Get In Touch</a></p>
        <br />
        <div>
          <div class="fb-like" data-href="https://www.facebook.com/TroyLakePT" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
          <br />
          <a href="https://twitter.com/TroyLakePT" class="twitter-follow-button mt10" data-show-count="false" data-size="large" data-dnt="true">Follow @TroyLakePT</a>
          <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
        </div>

      </div>
    </div>
    
  </div>
</section>

<!--Services Content-->
<section id="home-content">
  <div class="container">
    <div class="row">
      
      <a href="/services/1-2-1-training/1">
        <div class="col-sm-4 text-center home-box">
          <i class="fa fa-user fa-4x"></i>
          <h3><?php echo $data['one']->getName();?></h3>
          <p><?php echo $data['one']->getHeadline();?></p>
        </div>
      </a>
      
      <a href="/services/partner-training/3">
        <div class="col-sm-4 text-center home-box">
          <i class="fa fa-male fa-4x"></i><i class="fa fa-female fa-4x"></i>
          <h3><?php echo $data['partner']->getName();?></h3>
          <p><?php echo $data['partner']->getHeadline();?></p>
        </div>
      </a>
      
      <a href="/services/fit-farm/4">
        <div class="col-sm-4 text-center home-box">
          <img src="/img/tree.png">
          <h3 class="mt35"><?php echo $data['fitfarm']->getName();?></h3>
          <p><?php echo $data['fitfarm']->getHeadline();?></p>
        </div>
      </a>
      
    </div>
  </div>
</section>

<?php if ($data['videos']): ?>
<section id="content" class="pb40 pt20">
  <div class="container">
    
    <div class="row">
      
      <div class="col-sm-12 mb20">
        <h1 class="black">Check out my videos</h1>
      </div>
      
      <?php $pos = 1; ?>
      <?php foreach ($data['videos'] as $v): ?>
        <?php if ($pos === 1): ?>
          <div class="row">
        <?php endif; ?>
      <div class="col-sm-6 col-md-4">
        <div class="media mb20">
          <a class="pull-left" target="_blank" href="<?php echo $v->getUrl();?>">
            <img class="media-object" src="<?php echo $v->getThumbnail();?>" id="detail-thumb">
          </a>
          <div class="media-body">
            <h5 class="media-heading black lead"><?php echo $v->getTitle();?></h5>
            <p><?php echo $v->getDescription();?></p>
          </div>
        </div>
      </div>
        <?php if ($pos === 3): ?>
          <?php $pos = 0; ?>
          </div>
        <?php endif; ?>
      <?php $pos++; ?>
      <?php endforeach; ?>
      
      <?php if ($pos < 3): ?>
        </div>
      <?php endif; ?>
      
    </div>
    
  </div>
</section>
<?php endif; ?>
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
        document.location.href = "/welcome";
      }

      else {
        alert(data.error);
      }

    });

  });

});

</script>