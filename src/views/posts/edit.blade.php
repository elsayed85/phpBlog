<html>
<head>
    <title>Edit Post</title>
</head>
<body>
<h2>
    Edit : <?php echo $post->title; ?>
</h2>
<form method="post" action="/post/<?php echo $post->id ?>/edit">
    <label for="title">Title</label> <br>
    <input type="text" name="title" value="<?php echo $post->title ?>"> <br>
    <label for="content">Content</label> <br>
    <textarea name="content" cols="122" rows="10"><?php echo $post->content ?></textarea> <br>
    <input type="submit" value="Update">
</form>

<?php foreach ($_SESSION["errors"] ?? [] as $error): ?>
<p><?php echo $error; ?></p>
<?php endforeach; ?>


</body>
</html>