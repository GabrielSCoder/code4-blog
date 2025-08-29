<div
    class="post-panel p-4 mb-4 bg-white rounded shadow-sm h-100 flex-grow-1 d-flex flex-column justify-content-between">
    <div>
        <h1 class="fw-bold fs-2"><?= esc($post->titulo) ?></h1>

        <small class="text-muted d-block mb-2">
            <?php
            use CodeIgniter\I18n\Time;
            $postTime = Time::parse($post->data_cadastro);
            echo $postTime->format('d/m/Y H:i') . ' • Atualizado ' . $postTime->humanize();
            ?>
        </small>

        <h3 class=" fs-6 fw-light text-black"><?= esc($post->subtitulo) ?></h3><br />

        <p class="fs-5"><?= nl2br(esc($post->conteudo)) ?></p>
    </div><br />

    <button class="p-3 text-white border-0 bg-primary mx-auto rounded-3"
        onclick="window.location.href='<?= site_url('/') ?>'">
        Voltar
    </button>
</div>