<div class="container mt80">

  <form class="form-signin" role="form" id="signin">
    <input type="text" class="form-control" name="username" placeholder="Username" autofocus>
    <input type="password" class="form-control" name="password" placeholder="Password">

    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <div class="alert alert-danger mt10 hidden" id="signin-error">
      <p>Invalid sign in credentials, please try again.</p>
    </div>

  </form>

</div>

<script>

  $("form#signin").submit(function(e) {

    e.preventDefault();

    $('#signin-error').addClass("hidden");

    $.ajax({
      type: "POST",
      url: "/auth/login",
      data: $("form#signin").serialize()
    })
    .done(function( data ) {
      
      try {
        data = JSON.parse(data);
      }

      catch (e) {
        data = {
          success: false
        }
      }

      // fail
      if (data.success === false) {

        $('#signin-error').removeClass("hidden");

      }

      // no fail
      else {

        window.location.href=data.url;

      }

    });

  });

</script>