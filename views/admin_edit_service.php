<div class="container mt80">

  <!-- Main component for a primary marketing message or call to action -->
  <div class="jumbotron">
    <h1>Services</h1>
    <p>Manage the services that you advertise on your webiste.</p>
  </div>

  <div class="row">

    <div class="col-sm-12">

      <h2>Edit service</h2>

    </div>

    <div class="col-sm-6">

      <form role="form" id="service">
        <div class="form-group">
          <label for="name">Name</label>
          <input name="name" type="text" class="form-control" placeholder="e.g. One 2 One Training" value="<?php echo $data['service']->getName();?>" >
        </div>
        <div class="form-group">
          <label for="headline">Headline</label>
          <input name="headline" type="text" class="form-control" placeholder="e.g. The best way to achieve your goals" value="<?php echo $data['service']->getHeadline();?>" >
        </div>
        <div class="form-group">
          <label for="quote">Description <i class="glyphicon glyphicon-pencil"> </i></label><br />
          <textarea name="description" class="form-control" rows="3"><?php echo $data['service']->getDescription();?></textarea>
        </div>
        <div class="form-group">
          <label for="icon">Icon</label><br />
          <select name="icon" class="form-control" >
            <option value="">- none -</option>
            <?php foreach ($data['images'] as $i): ?>
            <?php $selected = ""; $selected = ($data['service']->getIcon() == $i->getPath()?"selected":""); ?>
              <option <?php echo $selected;?> value="<?php echo $i->getPath();?>"><?php echo $i->getName();?> (<?php echo $i->getWidth();?> x <?php echo $i->getHeight();?>)</option>
            <?php endforeach; ?>
          </select>
        </div>
        <input type="hidden" name="service_id" value="<?php echo $data['service']->getServiceId();?>" >
        <button type="submit" class="btn btn-success">Submit</button>
      </form>

    </div>

  </div>

<script>
  
  $("form#service").submit(function(e) {

    e.preventDefault();

    $.post("/admin/services/update/<?php echo $data['service']->getServiceId();?>", $(this).serialize(), function(data) {
      
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