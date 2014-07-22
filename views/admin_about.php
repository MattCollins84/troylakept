<div class="container mt80">

  <!-- Main component for a primary marketing message or call to action -->
  <div class="jumbotron">
    <h1>About</h1>
    <p>Edit the text in the &quot;About&quot; section on the homepage.</p>
  </div>

  <div class="row">

    <div class="col-sm-12">

      <h2>About</h2>

      <form role="form" id="about">
        <div class="form-group">
          <textarea name="about" class="form-control" rows="6"><?=$data['about']->getContent();?></textarea>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>

    </div>

  </div>

</div>

<script>
  
  $("form#about").submit(function(e) {

    e.preventDefault();

    $.post("/admin/about/update", $(this).serialize(), function(data) {
      
      try {
        data = JSON.parse(data);
      }

      catch (e) {
        data = {
          success: false
        }
      }

      if (data.success) {
        window.location.href = "/admin/about";
      }
      
      else {
        alert("There was a problem updating the about text, please try again")
      }

    });

  });

</script>