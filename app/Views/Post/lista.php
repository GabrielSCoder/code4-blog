<?= $filtro; ?>
<?php if (isset($posts) && !empty($posts)): ?>
<div class="flex-grow-1 overflow-auto">
    <?php foreach($posts as $post): ?>
    <div class="post-panel mb-3 p-3 rounded border" style="cursor:pointer;"
        onclick="window.location.href='<?= site_url('/postagem/'.$post->id) ?>'">
        <h3 class="fw-bold fs-4"><?= esc($post->titulo) ?></h3>
        <p class="fs-5 text-secondary"><?= esc($post->subtitulo) ?></p>
    </div>
    <?php endforeach; ?>
</div>
<?php else: ?>
<div class="flex-grow-1 d-flex justify-content-center align-items-center ">
    <div>
        <h4>
            Nenhuma postagem disponível 😥
        </h4>
    </div>
</div>
<?php endif; ?>
<div class="d-flex justify-content-center mt-3">
    <?= $pager->links('default', 'bootstrap_full') ?>
</div>