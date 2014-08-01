<div class="container mt80">

  <!-- Main component for a primary marketing message or call to action -->
  <div class="jumbotron">
    <h1>Services</h1>
    <p>Manage the services that you advertise on your webiste.</p>
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

      <h2>Add new service</h2>

    </div>

    <div class="col-sm-6">

      <form role="form" id="service">
        <div class="form-group">
          <label for="name">Name</label>
          <input name="name" type="text" class="form-control" placeholder="e.g. One 2 One Training">
        </div>
        <div class="form-group">
          <label for="headline">Headline</label>
          <input name="headline" type="text" class="form-control" placeholder="e.g. The best way to achieve your goals">
        </div>
        <div class="form-group">
          <label for="quote">Description <i class="glyphicon glyphicon-pencil"> </i></label><br />
          <textarea name="description" class="form-control" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label for="icon">Icon</label><br />
          <select name="icon" class="form-control" >
            <option value="">- none -</option>
            <? foreach ($data['images'] as $i): ?>
              <option value="<?=$i->getPath();?>"><?=$i->getName();?> (<?=$i->getWidth();?> x <?=$i->getHeight();?>)</option>
            <? endforeach; ?>
          </select>
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
            <th>Name</th>
            <th>Headline</th>
            <th>Description</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <? foreach ($data['services'] as $v): ?>
          <tr>
            <td><?=$v->getName();?></td>
            <td><?=$v->getHeadline();?></td>
            <td><?=nl2br($v->getDescription());?></td>
            <td><a class="btn btn-success" href="/admin/services/<?=$v->getServiceId();?>">Edit</a><br /><button class="btn btn-danger mt10" data-action="delete" data-id="<?=$v->getServiceId();?>">Delete</button></td>
          </tr>
          <? endforeach; ?>
        </tbody>
      </table>

    </div>

  </div>

</div>

<script>
  
  $("form#service").submit(function(e) {

    e.preventDefault();

    $.post("/admin/services/add", $(this).serialize(), function(data) {
      
      try {
        data = JSON.parse(data);
      }

      catch (e) {
        data = {
          success: false
        }
      }

      if (data.success) {
        window.location.href = "/admin/services";
      }
      
      else {
        alert(data.msg)
      }

    });

  });

  $("button[data-action=delete]").click(function(e) {

    var id = $(this).attr("data-id");

    if (confirm("Are you sure you want to delete this service?") === true) {

      $.post("/admin/services/delete/"+id, function(data) {
        
        window.location.href = "/admin/services";

      });

    }

  });

</script>