<div class="container mt80">

  <!-- Main component for a primary marketing message or call to action -->
  <div class="jumbotron">
    <h1>Videos</h1>
    <p>Manage the videos that show on the homepage.</p>
    <p>Enter a Youtube Video ID in the box below to add a new video.</p>
    <div class="row">
      <div class="col-sm-6">
        <input class="form-control" type="text" name="q" id="q" placeholder="e.g. 7Hb8qi0LHzE" />
        <button type="button" class="btn btn-success mt10" id="lookup">Get Video</button>
      </div>
      <div class="col-sm-6">
        <div class="alert alert-danger hidden" id="lookup-error">
          <p>Please check you have entered a valid YouTube ID</p>
        </div>
      </div>
    </div>
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

    <div class="col-sm-12" id="details">

      <div class="media mb20">
        <a class="pull-left" target="_blank" id="detail-link" href="#">
          <img class="media-object" src="" id="detail-thumb">
        </a>
        <div class="media-body">
          <h4 class="media-heading" id="detail-title"></h4>
          <p id="detail-desc"></p>
          <button class="btn btn-success hidden" type="button" id="save">Save Video</button>
        </div>
      </div>

    </div>

  </div>

  <div class="row">

    <div class="col-sm-12">

      <table class="table table-striped">
        <thead>
          <tr>
            <th></th>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <? foreach ($data['videos'] as $v): ?>
          <tr>
            <td><a href="<?=$v->getUrl();?>" target="_blank"><?=($v->getThumbnail()?"<img src='".$v->getThumbnail()."' />":"click here");?></a></td>
            <td><?=$v->getTitle();?></td>
            <td><?=$v->getDescription();?></td>
            <!--<td><i data-id="<?=$v->getVideoId();?>" data-action="feature" class="glyphicon featured-star glyphicon-star<?=($v->getFeatured()?"":"-empty");?>"></i></td>-->
            <td><button class="btn btn-danger" data-action="delete" data-id="<?=$v->getVideoId();?>"><i class="fa fa-trash-o"> </i> Delete</button></td>
          </tr>
          <? endforeach; ?>
        </tbody>
      </table>

    </div>

  </div>

</div>

<script>
  
  var video_data = {
    url: "",
    title: "",
    desc: "",
    thumbnail: ""
  }

  $("#lookup").click(function(e) {

    $("#lookup-error").addClass("hidden");

    getVideoDetails($("#q").val(), function(data) {
      
      if (data.success === false) {
        $("#lookup-error").removeClass("hidden");
      }

      else {

        $("#detail-title").text(data.title);
        video_data.title = data.title;

        $("#detail-desc").text(data.description)
        video_data.desc = data.description;

        var thumbnail = "";
        if (data.thumbnail && data.thumbnail.sqDefault) {
          thumbnail = data.thumbnail.sqDefault;
        }

        if (thumbnail) {
          $("#detail-thumb").attr("src", thumbnail);
          video_data.thumbnail = thumbnail;
        } else {
          video_data.thumbnail = ""
        }

        var link = "https://www.youtube.com/watch?v="+data.id
        $("#detail-link").attr("href", link);
        video_data.url = link;

        $('#save').removeClass("hidden");

      }

    });

  });

  var getVideoDetails = function(id, callback) {

    if (!id || typeof id != "string" || id.length <= 5) {
      return callback({success: false});
    }

    $.getJSON('http://gdata.youtube.com/feeds/api/videos/'+id+'?v=2&alt=jsonc',function(data,status,xhr){
      return callback(data.data);
    }).fail(function() {
      return callback({success: false});
    })

  }

  $("button#save").click(function(e) {

    $.post("/admin/videos/add", video_data, function(data) {
      
      try {
        data = JSON.parse(data);
      }

      catch (e) {
        data = {
          success: false
        }
      }

      if (data.success) {
        window.location.href = "/admin/videos";
      }
      
      else {
        alert("There was a problem saving your video, please try again")
      }

    });

  });

  $("button[data-action=delete]").click(function(e) {

    var id = $(this).attr("data-id");

    if (confirm("Are you sure you want to delete this video?") === true) {

      $.post("/admin/videos/delete/"+id, function(data) {
        
        window.location.href = "/admin/videos";

      });

    }

  });

  $("i[data-action=feature]").click(function(e) {

    var id = $(this).attr("data-id");

    if (confirm("Are you sure you want to feature this video?") === true) {

      $.post("/admin/videos/feature/"+id, function(data) {
        
        window.location.href = "/admin/videos";

      });

    }

  });

</script>