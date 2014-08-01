<? $pd = new Parsedown(); ?>
<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="utf-8">
  <title>Troy Lake PT | Stop wishing for it. Start working for it.</title>
  <meta name="keywords" content="<?=($data['keywords']?$data['keywords']:"troy lake pt, personal training, bootcamp, fit camp, diet plans, weight loss, insanity, workout");?>">
  <meta name="description" content="Website of Troy Lake, Personal Trainer. Based in the ">
  <meta name="viewport" content="width=device-width">
  
  <meta property="og:title" content="Troy Lake PT | Stop wishing for it. Start working for it.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="http://www.troylakept.com">
  <meta property="og:site_name" content="Troy Lake PT">
  <meta property="og:description" content="">

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  
  <!-- Styles -->
  <link rel="stylesheet" href="/css/jquery.bxslider.css">
  <link rel="stylesheet" href="/css/font-awesome.min.css">
  <link rel="stylesheet" href="/css/animate.css">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
  

  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/custom-styles.css">

  <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>

  <!-- Fav and touch icons -->
  <link rel="shortcut icon" href="/favicon.ico">
</head>

<body>
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=1455285094683498&version=v2.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand visible-lg mt10" href="/"><img src="/img/header-logo.png" /></a>
          <a class="navbar-brand hidden-lg" href="/"><img src="/img/header-logo-small.png" /></a>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="<?=($data['page']=="homepage"?"active":"");?>"><a href="/">Home</a></li>
            <li class="<?=($data['page']=="results"?"active":"");?>"><a href="/results">Results</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <? foreach ($data['services'] as $s): ?>
                  <li><a href="/services/<?=$s->getSEOName();?>/<?=$s->getServiceId();?>"><?=$s->getName();?></a></li>
                <? endforeach; ?>
              </ul>
            </li>
            <li class="<?=($data['page']=="blog"?"active":"");?>"><a href="/blog">Blog</a></li>
            <!--<li class="<?=($data['page']=="media"?"active":"");?>"><a href="/media">Media</a></li>-->
            <li class="sign-up"><a href="/contact"><span class="white"> Get In Touch</span></a></li>
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </div>