<?php $title = 'Home'; ?>


<div class="user-greeting">Hi <?= $user->name; ?>!</div>
<hr>

<div class="post-creation">
    <h2>Create Post</h2>
    <form action="/create-post" method="post">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="122" rows="10"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="Post">
        </div>
    </form>
</div>

<hr>

<?php foreach ($posts as $post) : ?>
    <div class="post">
        <h3>
            <?= $post->getTitle(); ?>
            <form action="/post/<?= $post->getId(); ?>/delete" method="post" class="form-delete">
                <input type="hidden" name="_method" value="delete" class="input-hidden">
                <input type="submit" value="Delete" class="btn btn-delete">
            </form>
        </h3>

        <p><?= $post->getContent(); ?></p>
        <div class="post-actions post-actions-style">
            <a href="/post/<?= $post->getId(); ?>/edit" class="btn btn-edit">Edit</a>
            <a href="/post/<?= $post->getId(); ?>/show" class="btn btn-show">Show</a>
        </div>
    </div>
    <hr>
<?php endforeach; ?>