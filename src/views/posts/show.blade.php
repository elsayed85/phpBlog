<html>
<head>
    <title>show Post</title>
</head>
<body>
<h2>
    Show : <?php echo $post->title; ?>
</h2>
<form>
    <label for="title">Title</label> <br>
    <input type="text" name="title" value="<?php echo $post->title ?>" disabled> <br>
    <label for="content">Content</label> <br>
    <textarea disabled name="content" cols="122" rows="10"><?php echo $post->content ?></textarea> <br>
</form>


</body
</html>