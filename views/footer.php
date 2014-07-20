    <!--Message-->
    <? if ($data['quote']): ?>
    <section id="message">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 text-center">
            <h4 class="gray"><i class="fa fa-quote-left"></i> <?=$data['quote']->getQuote();?> <i class="fa fa-quote-right"></i> </h4>
            <h5><?=$data['quote']->getName();?></h5>
          </div>
        </div>
      </div>
    </section>
    <? endif; ?>

    <!--Bottom Section-->
    <section id="bottom" class="pt20">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 text-center">
            <p>Troy Lake Personal Training HQ, 47 Westfield Avenue, redcar, TS10 1HF | 07711122333  |  <a href="mailto:troy@troylakept.com"><i class="fa fa-envelope-o"></i> troy@troylakept.com</a></p>
            <hr>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-10 col-md-offset-1 text-center">
            <!--Social Icons-->          
            <ul class="social-icons">
              <li><a class="twitter" href="https://twitter.com/TroyLakePT" target="_blank"><i class="fa fa-twitter fa-3x"></i></a></li>
              <li><a class="facebook" href="https://www.facebook.com/TroyLakePT" target="_blank"><i class="fa fa-facebook fa-3x"></i></a></li>
              <li><a class="instagram" href="http://instagram.com/troylakepersonaltraining" target="_blank"><i class="fa fa-camera-retro fa-3x"></i></a></li>
            </ul>
          </div>
        </div>
        
      </div>
    </section>
    
    <section id="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <p>Copyright <?=date("Y"); ?> - All Rights Reserved</p>
            <p><a href="/admin" target="_blank">admin</a></p>
          </div>
        </div>
      </div>
    </section>
      
    
    <!-- Javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
    
   
    </body>
</html>