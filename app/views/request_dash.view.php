<?php require 'partials/head.php'; ?>
<link rel="stylesheet" type="text/css" href="public/css/user_dash.css">

<div style="float:left">
        <div class=" p-3 my-3 ">
        <h2><span><a href="dashboard" >Users</a>/<a href="reqDash"style="text-decoration:underline;" >Requests </a></span></h2>
            <table class='table table-light table-striped' id='data' >
                <thead class='thead-dark'>
                    <tr class='head'>
                        <th scope='col'>Request </th>

                        <th scope='col'>More </th>
                    </tr>
                </thead>
                <tbody id='tb'>
                    <?php foreach ($userRequests as $request) : ?>
                        
                        <tr scope='row' class="user">           
                                <td><?php echo "{$request->email} has made a ".ucfirst($request->type); ?></td>
            
                                <td><a id='<?php echo $request->id?>'  href="request?reqId=<?php echo $request->id?>"><p style="font-size:30px;color:red;">&#9998;</p></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
            <div id='pag'>
      
    </div>

</div>
</div>

<div class="container p-3 my-3  text-white">

<p>No other requests to be shown</p>

</div>
<div class="container p-3 my-3  text-white">

</div>

<script src="public/js/request_dash.js" type="text/javascript"></script>
<?php require 'partials/footer.php'; ?>