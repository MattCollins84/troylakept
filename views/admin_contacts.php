<div class="container mt80">

  <!-- Main component for a primary marketing message or call to action -->
  <div class="jumbotron">
    <h1>Contacts</h1>
    <p>This is a list of all of the contacts that have signed up to the newsletter, for your reference.</p>
  </div>

  <div class="row">

    <div class="col-sm-12">

      <table class="table table-striped">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Active</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data['contacts'] as $c): ?>
          <tr>
            <td><?php echo $c->getName();?></td>
            <td><?php echo $c->getEmail();?></td>
            <td><?php echo $c->getPhone();?></td>
            <td><?php echo ($c->getActive()?"<i class='glyphicon glyphicon-ok'></i>":"<i class='glyphicon glyphicon-remove'></i>");?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

    </div>

  </div>

</div>