<?php require 'partials/head.php'; ?>

<div class="container">
  <div class="row">
    <div class="col-3">
    <h2>Users</h2>
            <table class='table table-light table-striped' id='data' >
                <thead class='thead-dark'>
                    <tr class='head'>
                        <th scope='col'>Email </th>
                        <th scope='col'>Password </th>
                        <th scope='col'>Role </th>
                        <th scope='col'>Verified </th>
                        <th scope='col'>More </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>

                        <tr scope='row' class="user">           
                              <td><?php echo ucfirst($user->email); ?></td>
                              <td><?php echo ucfirst($user->password); ?></td>
                              <td><?php echo ucfirst($user->role); ?></td>
                              <td><?php echo ucfirst($user->verified); ?></td>
                              <td><a id='<?php echo $user->id?>' href="<?php echo $user->email?>"><p style="font-size:30px;color:red;">&#9998;</p></a></td>
                      </tr>
                      
                  <?php endforeach; ?>
              </tbody>
          </table>
    </div>
    <div class="col-3">
    <h2>Users</h2>
            <table class='table table-light table-striped' id='data' >
                <thead class='thead-dark'>
                    <tr class='head'>
                        <th scope='col'>Email </th>
                        <th scope='col'>Password </th>
                        <th scope='col'>Role </th>
                        <th scope='col'>Verified </th>
                        <th scope='col'>More </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>

                        <tr scope='row' class="user">           
                              <td><?php echo ucfirst($user->email); ?></td>
                              <td><?php echo ucfirst($user->password); ?></td>
                              <td><?php echo ucfirst($user->role); ?></td>
                              <td><?php echo ucfirst($user->verified); ?></td>
                              <td><a id='<?php echo $user->id?>' href="<?php echo $user->email?>"><p style="font-size:30px;color:red;">&#9998;</p></a></td>
                      </tr>
                      
                  <?php endforeach; ?>
              </tbody>
          </table>
    </div>
  </div>
  <div class="row">
    <div class="col">
      1 of 3
    </div>
    <div class="col">
      2 of 3
    </div>
    <div class="col">
      3 of 3
    </div>
  </div>
</div>
<?php require('partials/footer.php'); ?>