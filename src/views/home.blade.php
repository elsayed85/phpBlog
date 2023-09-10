<html>
<head>
    <title>Home</title>
</head>
<body>
Hi <?php echo $user->name; ?>!
<br>
<a href="/logout">Logout</a>

<hr>

<h2>Create Post</h2>
<form action="/create-post" method="post">
    <label for="title">Title</label> <br>
    <input type="text" name="title"> <br>
    <label for="content">Content</label> <br>
    <textarea name="content" cols="122" rows="10"></textarea> <br>
    <input type="submit" value="Post">
</form>

<hr>

<?php foreach ($posts as $post): ?>
<h3><?php echo $post->title; ?></h3>
<p><?php echo $post->content; ?></p>
<button onclick="window.location.href='/post/<?php echo $post->id; ?>/edit'">Edit</button>
<button onclick="window.location.href='/post/<?php echo $post->id; ?>/show'">Show</button>
<form action="/post/<?php echo $post->id; ?>/delete" method="post">
    <input type="hidden" name="_method" value="delete">
    <input type="submit" value="Delete">
</form>
<hr>
<?php endforeach; ?>

</body>
</html>