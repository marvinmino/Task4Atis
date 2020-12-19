
<?php require 'partials/head.php'; ?>

<br>
<!-- Page Content  -->
<div id="content">

    <div class="float-md-none">
        </br>
        <?php
        if (isset($_SESSION['error'])) {
            ?><div class="alert alert-danger"><?php echo $_SESSION['error']; ?></div>
        <?php unset($_SESSION['error']);
        } ?>
        <form action="category" method="post" class='form-popup form'>
            <div class="form-group">
                <label for="categoryName">Select Category Name:
                </label>
                <input class="form-control" type="text" placeholder="Category Name..." name="categoryName" id="albName">
            </div>
            <input class="form-control" type="submit" value="Create Category" name='alb_frm'>
        </form>
    </div>

<br>
<br>

    <div>
        <table class="table table-secondary">
            <thead>
                <th>Name</th>
                <th>More</th>
            </thead>
                <?php 
                foreach ($categories as $category) : ?>
                <tr>
                <td><p class="show<?php echo $category->id?>" id="<?php echo $category->id?>" style="align:center"><?php echo $category->name ?></p>  
                <div class="edit edit<?php echo $category->id?>"><input type="text" class="in<?php echo $category->id?>" id="<?php echo $category->id?>"value="<?php echo $category->name?>">
                    <a href="#" class="go" id="<?php echo $category->id?>" style="font-size:15px;color:red;">-></a>
                </div>
                </td>
                <td>
                <a id='<?php echo $category->id?>'  href="#" style="font-size:15px;color:blue;" class="cat">Edit </a>| 
                <a id='<?php echo $category->id?>' class="delete" href="#" style="font-size:15px;color:red;" >Delete</a></td>
            </tr>
        <?php endforeach; ?>
            
        </table>
        <p class='dummy'></p>
    </div>
</div>


<script src="public/js/category.js" type="text/javascript"></script>
<?php require 'partials/footer.php'; ?>

