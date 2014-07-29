<? $pd = new Parsedown(); ?>
<div class="container mt80">

  <!-- Main component for a primary marketing message or call to action -->
  <div class="jumbotron">
    <h1>Blog</h1>
    <p>Manage your blog posts</p>
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

      <h2>Add new Blog Post</h2>

    </div>

    <div class="col-sm-12">

      <form role="form" id="blog">
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="title">Title</label>
              <input name="title" type="text" class="form-control" placeholder="e.g. My top 10 ways to lose weight">
            </div>
            <div class="form-group">
              <label for="keywords">Keywords <em>(comma separated)</em></label>
              <input name="keywords" type="text" class="form-control" placeholder="e.g. weight loss, toning, bulk up">
            </div>
            <div class="form-group">
              <label for="intro">Introduction <em>(Shown on main blog page)</em> <i class="glyphicon glyphicon-pencil"> </i></label><br />
              <textarea name="intro" class="form-control" rows="3"></textarea>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="body">Body <i class="glyphicon glyphicon-pencil"> </i></label><br />
              <textarea name="body" class="form-control" rows="10"></textarea>
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

      <table class="table table-striped">
        <thead>
          <tr>
            <th>Title</th>
            <th>Posted</th>
            <th>Intro</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <? foreach ($data['posts'] as $v): ?>
          <tr>
            <td><?=$v->getTitle();?></td>
            <td><?=$v->getPostedDate()->getAsEnglishDate();?></td>
            <td><?=$pd->text($v->getIntro());?></td>
            <td><a class="btn btn-success" href="/admin/blog/<?=$v->getBlogId();?>">Edit</a><br /><button class="btn btn-danger mt10" data-action="delete" data-id="<?=$v->getBlogId();?>">Delete</button></td>
          </tr>
          <? endforeach; ?>
        </tbody>
      </table>

    </div>

  </div>

</div>

<script>
  
  $("form#blog").submit(function(e) {

    e.preventDefault();

    $.post("/admin/blog/add", $(this).serialize(), function(data) {
      
      try {
        data = JSON.parse(data);
      }

      catch (e) {
        data = {
          success: false
        }
      }

      if (data.success) {
        window.location.href = "/admin/blog";
      }
      
      else {
        alert(data.msg)
      }

    });

  });

  $("button[data-action=delete]").click(function(e) {

    var id = $(this).attr("data-id");

    if (confirm("Are you sure you want to delete this blog post?") === true) {

      $.post("/admin/blog/delete/"+id, function(data) {
        
        window.location.href = "/admin/blog";

      });

    }

  });

</script>