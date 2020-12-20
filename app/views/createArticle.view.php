<?php require 'partials/head.php'; ?>
<script src="https://cdn.tiny.cloud/1/cyosdq7ivz0h2uicnhnkky2no8viq93lj7e370rc4w500rro/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>

tinymce.init({
  selector: 'textarea#default',
  plugins: "textcolor",
  menubar: false,
  toolbar: "undo redo | styleselect | forecolor | bold italic | alignleft aligncenter alignright alignjustify | outdent indent"
});

</script>

<div class="container p-3 my-3  text-white" style="">

<?php
if (isset($_SESSION['error'])) {
  ?><div class="alert alert-danger"><?php echo $_SESSION['error']; ?></div>
      <?php unset($_SESSION['error']);
    }  ?>
<form action="articlesave" method="post" enctype="multipart/form-data">
<input style="float:left"type="submit" class="btn btn-danger btn-lg btn-block" value="Create Article" name='frm'>
<input type="text" class="form-control" placeholder="Title" name="title">
<input type="text" class="form-control" placeholder="Description" name="description">
<label for="fileToUpload" style="float:left">Article Tags(<i>Divide the tags by using a forward slash "/"</i> )</label>
<input type="text" class="form-control" placeholder="Tags" name="tags">
<label for="fileToUpload" style="float:left">Article Main Image:</label>
<input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
<label for="category" style="float:left">Category Select:</label>
<select name="category" class="form-control" placeholder="select">
  <?php foreach($categories as $category):?>
    <option value="<?php echo $category->name?>"><?php echo $category->name?></option>
    <?php endforeach?>
</select>
<label for="date" style="float:left">Article Publish Date::</label>
<input type="date" name="date" class="form-control">
<label for="content" style="float:left">Article Content:</label>
<hr>


<textarea id="default" class="form-control" placeholder="Content" name="content" style="height:600px"></textarea>

</form>

</div>
<div class="container p-3 my-3  text-white">

</div>

<div class="container p-3 my-3  text-white">

<p></p>

</div>
<div class="container p-3 my-3  text-white">

</div>

<div class="container p-3 my-3  text-white">

<p></p>

</div>
<div class="container p-3 my-3  text-white">

</div>

<?php require('partials/footer.php'); ?>