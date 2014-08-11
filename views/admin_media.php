<div class="container mt80">

  <!-- Main component for a primary marketing message or call to action -->
  <div class="jumbotron">
    <h1>Media Links</h1>
    <p>Manage your media links</p>
  </div>
  
  <?php if ($data['msg']): ?>
  <div class="row">

    <div class="col-sm-12">

      <div class="alert alert-success">
        <p><?php echo $data['msg'];?></p>
      </div>

    </div>

  </div>
  <?php endif; ?>
  
  <div class="row">

    <div class="col-sm-12">

      <h2>Add new media link</h2>

    </div>

    <div class="col-sm-6">

      <form role="form" id="media">
        <div class="form-group">
          <label for="title">Title</label>
          <input name="title" type="text" class="form-control" placeholder="e.g. How personal trainers can help you">
        </div>
        <div class="form-group">
          <label for="intro">Brief description  <i class="glyphicon glyphicon-pencil"> </i></label><br />
          <textarea name="intro" class="form-control" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label for="url">Link <em>(Please include the leading http://)</em></label>
          <input name="url" type="text" class="form-control" placeholder="e.g. http://www.newspaper.com/troy-lake-pt">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>

    </div>

  </div>

  <div class="row">

    <div class="col-sm-12">

      <table class="table table-striped">
        <thead>
          <tr>
            <th>Title</th>
            <th>Link</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data['media'] as $q): ?>
          <tr>
            <td><?php echo $q->getTitle();?></td>
            <td><a href="<?php echo $q->getUrl();?>" target="_blank"><?php echo $q->getUrl();?></a></td>
            <td><button class="btn btn-danger" data-action="delete" data-id="<?php echo $q->getMediaId();?>"><i class="fa fa-trash-o"> </i> Delete</button></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

    </div>

  </div>

</div>

<script>

  $("button[data-action=delete]").click(function(e) {

    var id = $(this).attr("data-id");

    if (confirm("Are you sure you want to delete this media link?") === true) {

      $.post("/admin/media/delete/"+id, function(data) {
        
        window.location.href = "/admin/media";

      });

    }

  });

  $("form#media").submit(function(e) {

    e.preventDefault();

    $.post("/admin/media/add", $("form#media").serialize(), function(data) {
      
      try {
        data = JSON.parse(data);
      }

      catch (e) {
        data = {
          success: false
        }
      }

      if (data.success) {
        window.location.href = "/admin/media";
      }
      
      else {
        alert(data.msg)
      }

    });

  });

</script>