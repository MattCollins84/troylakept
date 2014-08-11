<?php $pd = new Parsedown(); ?>
<div class="container mt80 mb10">

  <!-- Main component for a primary marketing message or call to action -->
  <div class="jumbotron">
    <h1>Results</h1>
    <p>Manage the results stories</p>
  </div>
  
  <div class="row">

    <div class="col-sm-12">

      <h2>Edit customer story</h2>

    </div>

    <div class="col-sm-12">

      <form role="form" id="result" action="/admin/results/upload" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="name">Name</label>
              <input name="name" id="name" type="text" class="form-control" placeholder="e.g. Stacey, Redcar" value="<?php echo $data['result']->getName();?>">
            </div>
            <div class="form-group">
              <label for="goals">Goals</label>
              <input name="goals" id="goals" type="text" class="form-control" placeholder="e.g. weight loss, toning up" value="<?php echo $data['result']->getGoals();?>">
            </div>
            <div class="form-group">
              <label for="intro">Introduction</label><br />
              <textarea name="intro" id="intro" class="form-control" rows="5"><?php echo $data['result']->getIntro();?></textarea>
            </div>
            <div class="form-group">
              <img src="/uploads/thumb_<?php echo $data['result']->getImg();?>" class="img-responsive img-block">
              <label for="image">Upload Image<br />
              <input type="file" id="image" name="image" />
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="story">Story <i class="glyphicon glyphicon-pencil"> </i></label><br />
              <textarea name="story" id="story" class="form-control" rows="16"><?php echo $data['result']->getStory();?></textarea>
            </div>
          </div>
          <div class="col-sm-12">
            <button type="submit" class="btn btn-success">Submit</button>
            <input type="hidden" name="result_id" value="<?php echo $data['result']->getResultId();?>" />
          </div>
        </div>
      </form>

    </div>

  </div>

</div>

<script>
  
  function toTitleCase(str) {
    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
  }

  $("form#result").submit(function(e) {

    // get data
    var data = {
      name: $("form #name").val(),
      goals: $("form #goals").val(),
      story: $("form #story").val(),
      intro: $("form #intro").val()
    }

    var missing = [];

    // check we have something
    for (var d in data) {

      if (!data[d]) {
        missing.push(toTitleCase(d));
      }

    }

    if (missing.length) {
      alert("Please complete the following fields:\n* "+missing.join("\n* "));
      e.preventDefault();
      return false;
    }

    if ($("form #image").val() != "") {
      var allowed = ["png", "jpg", "jpeg"];

      // check image
      data.image = $("form #image").val();
      var path = data.image.split(".")
      var ext = path[path.length-1];

      if (allowed.indexOf(ext) == -1) {
        alert("This image type is not allowed. Please select one of:\n* "+allowed.join("\n* "));
        e.preventDefault();
        return;
      }
    }

  });

</script>