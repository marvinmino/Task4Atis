<?php require 'partials/head.php'; ?>
<script src="https://cdn.tiny.cloud/1/cyosdq7ivz0h2uicnhnkky2no8viq93lj7e370rc4w500rro/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>

tinymce.init({
  selector: 'textarea#default'
});

</script>
<form action="articlesave" method="post">
<input type="text" placeholder="title">
<input type="text" placeholder="title">
<input type="text" placeholder="title">
<textarea id="default">Hello, World!</textarea>
</form>
<?php require('partials/footer.php'); ?>