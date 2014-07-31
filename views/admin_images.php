<? $pd = new Parsedown(); ?>
<div class="container mt80">

  <!-- Main component for a primary marketing message or call to action -->
  <div class="jumbotron">
    <h1>Images</h1>
    <p>Upload images for use throughout your website</p>
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

      <h2>Add new image</h2>

    </div>

    <div class="col-sm-12">

      <form role="form" id="result" action="/admin/images/upload" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="image">Upload Image<br />
              <input type="file" id="image" name="image" />
            </div>
            <div class="form-group">
              <label for="width">Width <em>(The Maximum desired width for this image, default is 900px)</em></label>
              <input name="width" id="width" type="text" class="form-control" placeholder="e.g. 900">
            </div>
            <div class="form-group">
              <label for="height">Height <em>(The Maximum desired height for this image, default is 400px)</em></label>
              <input name="height" id="height" type="text" class="form-control" placeholder="e.g. 400">
            </div>
            <div class="form-group">
              <label for="name">Name <em>(A simple way for you to identify this image)</em></label>
              <input name="name" id="name" type="text" class="form-control" placeholder="e.g. Abs class small image">
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

      <h2>Manage existing images</h2>

    </div>

    <div class="col-sm-12">

      <table class="table table-striped">
        <thead>
          <tr>
            <th>Thumbnail</th>
            <th>Name</th>
            <th>W x H</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <? foreach ($data['images'] as $v): ?>
          <tr>
            <td><img src="/uploads/thumb_<?=$v->getPath();?>"></td>
            <td><?=$v->getName();?></td>
            <td><?=$v->getWidth();?> x <?=$v->getHeight();?></td>
            <td><button class="btn btn-danger mt10" data-action="delete" data-id="<?=$v->getImageId();?>">Delete</button></td>
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
      image: $("form #image").val()
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

    if ($("form #height").val() == "") {
      $("form #height").val(400)
    }

    if ($("form #width").val() == "") {
      $("form #width").val(900)
    }

    // check height and width
    if (isNaN(parseInt($("form #height").val())) || isNaN(parseInt($("form #width").val()))) {
      alert("Please make sure the values supplied for height and width are numeric");
      e.preventDefault();
      return false;
    }

    $("form #height").val(parseInt($("form #height").val()));
    $("form #width").val(parseInt($("form #width").val()));

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

    if (confirm("Are you sure you want to delete this Image?") === true) {

      $.post("/admin/image/delete/"+id, function(data) {
        
        window.location.href = "/admin/images";

      });

    }

  });

</script>