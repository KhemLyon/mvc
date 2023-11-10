<h1 class="text-center">Search</h1>
<h2 class="text-center">Found <?= count($pictures) ?> result(s)</h2>
<section class="row">
  <?php foreach ($pictures as $pic) : ?>

    <article class="col-12 col-sm-6 col-md-4">
      <div class="card mb-3">
        <img src="<?= $pic['src'] ?>" class="card-img-top" alt="<?= $pic['title'] ?>">
        <div class="card-body">
          <h4 class="card-title"><?= $pic['title'] ?></h4>
          <p class="card-text"><?= $pic['description'] ?></p>
          <p class="card-text"><?= $pic['updated_at'] ?></p>
          <p class="card-text"><?= $pic['author'] ?></p>
          <a href="<?= "?page=detail&id=".$pic['id'] ?>" class="btn btn-secondary">Read more</a>
        </div>
      </div>
    </article>

  <?php endforeach ?>
</section>