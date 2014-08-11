<div class="container mt80">

  <!-- Main component for a primary marketing message or call to action -->
  <div class="jumbotron">
    <h1>Quotes</h1>
    <p>Manage the random quotes that appear at the bottom of each website page.</p>
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

      <h2>Add new quote</h2>

    </div>

    <div class="col-sm-6">

      <form role="form" id="quote">
        <div class="form-group">
          <label for="name">Name</label>
          <input name="name" type="text" class="form-control" placeholder="e.g. John, Redcar">
        </div>
        <div class="form-group">
          <label for="quote">Quote</label><br />
          <textarea name="quote" class="form-control" rows="3"></textarea>
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
            <th>Quote</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data['quotes'] as $q): ?>
          <tr>
            <td><?php echo $q->getName();?></td>
            <td><?php echo $q->getQuote();?></td>
            <td><button class="btn btn-danger" data-action="delete" data-id="<?php echo $q->getQuoteId();?>"><i class="fa fa-trash-o"> </i> Delete</button></td>
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

    if (confirm("Are you sure you want to delete this quote?") === true) {

      $.post("/admin/quotes/delete/"+id, function(data) {
        
        window.location.href = "/admin/quotes";

      });

    }

  });

  $("form#quote").submit(function(e) {

    e.preventDefault();

    $.post("/admin/quotes/add", $("form#quote").serialize(), function(data) {
      
      try {
        data = JSON.parse(data);
      }

      catch (e) {
        data = {
          success: false
        }
      }

      if (data.success) {
        window.location.href = "/admin/quotes";
      }
      
      else {
        alert("Please complete both the name and the quote fields")
      }

    });

  });

</script>