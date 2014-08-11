    <!--Message-->
    <?php if ($data['quote']): ?>
    <section id="message">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 text-center">
            <h4 class="gray"><i class="fa fa-quote-left"></i> <?php echo $data['quote']->getQuote();?> <i class="fa fa-quote-right"></i> </h4>
            <h5><?php echo $data['quote']->getName();?></h5>
          </div>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <!--Bottom Section-->
    <section id="bottom" class="pt20">
      <div class="container">
        
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
            <p>Copyright <?php echo date("Y"); ?> - All Rights Reserved | <a href="/admin" target="_blank" rel="nofollow">admin</a></p>
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