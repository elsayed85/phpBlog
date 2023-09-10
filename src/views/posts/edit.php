<?php $title = 'Edit Post : ' . $post->title; ?>

<h2 style="color: blue;">
    Edit : <?php echo $post->title; ?>
</h2>
<form method="post" action="/post/<?php echo $post->id ?>/edit" style="background-color: lightgrey; padding: 20px;">
    <label for="title" style="font-weight: bold;">Title</label> <br>
    <input type="text" name="title" value="<?php echo $post->title ?>" style="width: 100%; padding: 10px;"> <br>
    <label for="content" style="font-weight: bold;">Content</label> <br>
    <textarea name="content" cols="122" rows="10" style="width: 100%; padding: 10px;"><?php echo $post->content ?></textarea> <br>
    <input type="submit" value="Update" style="background-color: blue; color: white; padding: 10px 20px;">
</form>

<?php foreach ($_SESSION["errors"] ?? [] as $error) : ?>
    <p style="color: red;"><?php echo $error; ?></p>
<?php endforeach; ?>