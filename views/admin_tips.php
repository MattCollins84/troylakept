<div class="container mt80">

  <!-- Main component for a primary marketing message or call to action -->
  <div class="jumbotron">
    <h1>Top Tips</h1>
    <p>Add and remove your top tips</p>
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

      <h2>Add new top tip</h2>

    </div>

    <div class="col-sm-6">

      <form role="form" id="tips">
        <div class="form-group">
          <label for="tip">Top Tip <i class="glyphicon glyphicon-pencil"> </i></label><br />
          <textarea name="tip" class="form-control" rows="3"></textarea>
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
            <th>Tip</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <? foreach ($data['tips'] as $q): ?>
          <tr>
            <td><?=$q->getTip();?></td>
            <td><button class="btn btn-danger" data-action="delete" data-id="<?=$q->getTipId();?>"><i class="fa fa-trash-o"> </i> Delete</button></td>
          </tr>
          <? endforeach; ?>
        </tbody>
      </table>

    </div>

  </div>

</div>

<script>

  $("button[data-action=delete]").click(function(e) {

    var id = $(this).attr("data-id");

    if (confirm("Are you sure you want to delete this top tip?") === true) {

      $.post("/admin/tips/delete/"+id, function(data) {
        
        window.location.href = "/admin/tips";

      });

    }

  });

  $("form#tips").submit(function(e) {

    e.preventDefault();

    $.post("/admin/tips/add", $("form#tips").serialize(), function(data) {
      
      try {
        data = JSON.parse(data);
      }

      catch (e) {
        data = {
          success: false
        }
      }

      if (data.success) {
        window.location.href = "/admin/tips";
      }
      
      else {
        alert(data.msg)
      }

    });

  });

</script>