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
              <input name="title" type="text" class="form-control" placeholder="e.g. My top 10 ways to lose weight" value="<?=$data['post']->getTitle();?>">
            </div>
            <div class="form-group">
              <label for="keywords">Keywords <em>(comma separated)</em></label>
              <input name="keywords" type="text" class="form-control" placeholder="e.g. weight loss, toning, bulk up" value="<?=$data['post']->getKeywords();?>">
            </div>
            <div class="form-group">
              <label for="intro">Introduction <em>(Shown on main blog page)</em> <i class="glyphicon glyphicon-pencil"> </i></label><br />
              <textarea name="intro" class="form-control" rows="3"><?=$data['post']->getIntro();?></textarea>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="body">Body <i class="glyphicon glyphicon-pencil"> </i></label><br />
              <textarea name="body" class="form-control" rows="10"><?=$data['post']->getBody();?></textarea>
            </div>
          </div>
          <div class="col-sm-12">
            <button type="submit" class="btn btn-success">Submit</button>
            <input type="hidden" name="blog_id" value="<?=$data['post']->getBlogId();?>" >
          </div>
        </div>
      </form>

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

</script>