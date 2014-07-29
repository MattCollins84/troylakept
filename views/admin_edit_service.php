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
          <input name="name" type="text" class="form-control" placeholder="e.g. One 2 One Training" value="<?=$data['service']->getName();?>" >
        </div>
        <div class="form-group">
          <label for="headline">Headline</label>
          <input name="headline" type="text" class="form-control" placeholder="e.g. The best way to achieve your goals" value="<?=$data['service']->getHeadline();?>" >
        </div>
        <div class="form-group">
          <label for="quote">Description <i class="glyphicon glyphicon-pencil"> </i></label><br />
          <textarea name="description" class="form-control" rows="3"><?=$data['service']->getDescription();?></textarea>
        </div>
        <input type="hidden" name="service_id" value="<?=$data['service']->getServiceId();?>" >
        <button type="submit" class="btn btn-success">Submit</button>
      </form>

    </div>

  </div>

<script>
  
  $("form#service").submit(function(e) {

    e.preventDefault();

    $.post("/admin/services/update/<?=$data['service']->getServiceId();?>", $(this).serialize(), function(data) {
      
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