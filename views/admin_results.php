<? $pd = new Parsedown(); ?>
<div class="container mt80">

  <!-- Main component for a primary marketing message or call to action -->
  <div class="jumbotron">
    <h1>Results</h1>
    <p>Manage the results stories</p>
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
  
  <div class="row">

    <div class="col-sm-12">

      <h2>Add new customer story</h2>

    </div>

    <div class="col-sm-12">

      <form role="form" id="result" action="/admin/results/upload" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="name">Name</label>
              <input name="name" id="name" type="text" class="form-control" placeholder="e.g. Stacey, Redcar">
            </div>
            <div class="form-group">
              <label for="goals">Goals</label>
              <input name="goals" id="goals" type="text" class="form-control" placeholder="e.g. weight loss, toning up">
            </div>
            <div class="form-group">
              <label for="intro">Introduction </label><br />
              <textarea name="intro" id="intro" class="form-control" rows="5"></textarea>
            </div>
            <div class="form-group">
              <label for="image">Upload Image<br />
              <input type="file" id="image" name="image" />
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="story">Story <i class="glyphicon glyphicon-pencil"> </i></label><br />
              <textarea name="story" id="story" class="form-control" rows="16"></textarea>
            </div>
          </div>
          <div class="col-sm-12">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>

    </div>

  </div>

  <div class="row">

    <div class="col-sm-12">

      <h2>Manage existing customer stories</h2>

    </div>

    <div class="col-sm-12">

      <table class="table table-striped">
        <thead>
          <tr>
            <th>Name</th>
            <th>Goals</th>
            <th>Story</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <? foreach ($data['results'] as $v): ?>
          <tr>
            <td><?=$v->getName();?></td>
            <td><?=$v->getGoals();?></td>
            <td><?=$pd->text(substr($v->getStory(), 0, 70)."...");?></td>
            <td><a class="btn btn-success" href="/admin/result/<?=$v->getResultId();?>">Edit</a><br /><button class="btn btn-danger mt10" data-action="delete" data-id="<?=$v->getResultId();?>">Delete</button></td>
          </tr>
          <? endforeach; ?>
        </tbody>
      </table>

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
      image: $("form #image").val(),
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

    var allowed = ["png", "jpg", "jpeg"];

    // check image
    var path = data.image.split(".")
    var ext = path[path.length-1];

    if (allowed.indexOf(ext) == -1) {
      alert("This image type is not allowed. Please select one of:\n* "+allowed.join("\n* "));
      e.preventDefault();
      return;
    }

  });

  $("button[data-action=delete]").click(function(e) {

    var id = $(this).attr("data-id");

    if (confirm("Are you sure you want to delete this customer story?") === true) {

      $.post("/admin/results/delete/"+id, function(data) {
        
        window.location.href = "/admin/results";

      });

    }

  });

</script>