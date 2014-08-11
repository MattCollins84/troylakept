    <!--Page Title-->
  <section id="page-title">
    <div class="container">
      <div class="row">
        <div class="col-md-12 title-white">
          <h2>Check out some of my success stories below...</h2>
        </div>
      </div>
    </div>
  </section>
  
  
  <!--Portfolio Content-->
  <section id="content" class="mt40">
    <div class="container">
      
      <div class="row">
        
          <ul class="list-inline portfolio text-center">
            
            <?php foreach ($data['results'] as $r): ?>
            <!--Project Thumbnail-->
            <li data-tag="graphics">
              <div class="thumbs">
                <img src="/uploads/thumb_<?php echo $r->getImg();?>" class="img-responsive img-block" alt="<?php echo $r->getName();?> - Before and after">
                <a href="/results/<?php echo $r->getSEOTitle();?>/<?php echo $r->getResultId();?>">
                  <span class="title">
                    <p><?php echo $r->getIntro();?></p>
                    <p class="text-center mt40"><i class="fa fa-folder fa-4x"></i><br />See full case study</p>
                  </span> 
                </a>
              </div>
              
              <div class="project-title margin-30">
                <h5><?php echo $r->getName();?> - <?php echo $r->getGoals();?></h5>
              </div>
            </li>
            <?php endforeach; ?>
            
          </ul><!--End Work List-->
      </div><!--End Row-->
            
    </div>
  </section>
  