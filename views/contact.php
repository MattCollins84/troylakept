<!--Page Title-->
<section id="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-12 title-white">
        <h2>Get in touch with Troy today</h2>
      </div>
    </div>
  </div>
</section>


<!--Content Section-->
<section class="content mt40">
  <div class="container">
    
    <div class="row">
      <div class="col-md-8">
        
        <form method="POST" id="contact">
          <input type="text" class="col-xs-12" name="name" placeholder="Name">
          <input type="text" class="col-xs-12" name="email" placeholder="Email">
          <input type="text" class="col-xs-12" name="phone" placeholder="Phone number">
          <input type="text" class="col-xs-12" name="subject" placeholder="Subject">
          <textarea class="col-xs-12" name="message" placeholder="Message"></textarea>
          <input type="text" class="col-xs-12" name="where" placeholder="Where did you hear about Troy Lake PT?">
          <p><input type="checkbox" name="signup" value="1"> If you do not want to receive free fitness tips and articles from Troy, click here.</p>
          <p><button class="btn-main" type="submit">Send Message</button></p>
        </form>
      </div><!--End Span8-->
      
      <div class="col-md-4">
        <p class="lead">How to find me<p>
        <address>
        Troy Lake Personal Training HQ<br />
        47 Westfield Avenue<br />
        Redcar<br />
        Cleveland<br />
        TS10 1HF
        </adress>

        <p class="mt20">
          <a class="text-primary" target="_blank" href="https://twitter.com/TroyLakePT"><i class="fa fa-twitter-square fa-2x"> </i></a> 
          <a class="text-primary" target="_blank" href="https://www.facebook.com/TroyLakePT"><i class="fa fa-facebook-square fa-2x"> </i></a> 
          <a class="text-primary" target="_blank" href="http://instagram.com/troylakepersonaltraining"><i class="fa fa-camera-retro fa-2x"> </i></a>
        </p>
      </div>
      
    </div><!--End Row-->   
  </div>
</section> 
 


<!--Map Section-->
<section id="map" class="mt20">

  <iframe src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=47%20westfield%20avenue%20redcar&amp;aq=&amp;sll=54.613017,-1.071563&amp;sspn=8.89966,16.907959&amp;ie=UTF8&amp;hq=&amp;hnear=Redcar&amp;t=m&amp;z=16&amp;iwloc=A&amp;output=embed"></iframe>
  
</section>

<script>
  
  $("form#contact").submit(function(e) {

    e.preventDefault();

    $.post("/contact/send", $("form#contact").serialize(), function(data) {
      
      try {
        data = JSON.parse(data);
      }

      catch (e) {
        data = {
          success: false
        };
      }

      if (data.success) {
        document.location.href="/thanks"
      }

      else {
        alert(data.error);
      }

    });

  });

</script>