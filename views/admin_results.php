<div class="container mt80">

  <!-- Main component for a primary marketing message or call to action -->
  <div class="jumbotron">
    <h1>Results</h1>
    <p>Manage the results section of your website</p>
  </div>
  
  <? if ($data['msg']): ?>
  <div class="row">

    <div class="col-sm-12">

      <div class="alert alert-success">
        <p><?=$data['msg'];?></p>
      </div>

    </div>

  </div>
  <? endif; ?>

</div>