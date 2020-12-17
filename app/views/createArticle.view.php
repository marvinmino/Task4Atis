<?php require 'partials/head.php'; ?>
<script src="https://cdn.tiny.cloud/1/cyosdq7ivz0h2uicnhnkky2no8viq93lj7e370rc4w500rro/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>

tinymce.init({
  selector: 'textarea#default',
  plugins: "textcolor",
  toolbar: "forecolor backcolor"
});

</script>

<div class="container p-3 my-3  text-white" style="">

<?php
if (isset($_SESSION['error'])) {
  ?><div class="alert alert-danger"><?php echo $_SESSION['error']; ?></div>
      <?php unset($_SESSION['error']);
    }  ?>
<form action="articlesave" method="post" class="">
<input type="text" class="form-control" placeholder="title" name="title">
<input type="text" class="form-control" placeholder="description" name="description">
<textarea id="default" class="form-control" placeholder="content" name="content"></textarea>
<input style="float:left"type="submit" class="btn btn-primary btn-lg btn-block" value="Post" name='frm'>
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