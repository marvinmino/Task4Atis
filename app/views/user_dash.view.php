<?php require 'partials/head.php'; ?>
<link rel="stylesheet" type="text/css" href="public/css/user_dash.css">
<div style="float:left">
        <div class=" p-3 my-3 ">
        <h2><span><a href="#" style="text-decoration:underline;" >Users</a>/<a href="reqDash">Requests </a></span></h2>
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
                <tbody id='tb'>
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
            <div id='pag'>
      
    </div>

</div>
</div>
<div class="container p-3 my-3  text-white">

</div>
<div class="container p-3 my-3  text-white">

</div>


<?php require('partials/footer.php'); ?>