<form class="d-flex flex-column gap-3 p-4 rounded shadow-sm bg-light"
    action="<?= isset($post) && isset($post->id) ? site_url('post/store/'.$post->id) : site_url('post/store') ?>"
    method="post">

    <div class="mb-3">
        <label for="titulo" class="form-label">Título da postagem</label>
        <input type="text" id="titulo" name="titulo"
            value="<?= esc(set_value('titulo', isset($post) ? $post->titulo : '') ) ?>" class="form-control"
            placeholder="Digite o título" required>
    </div>

    <div class="mb-3">
        <label for="subtitulo" class="form-label">Subtítulo</label>
        <input type="text" id="subtitulo" name="subtitulo"
            value="<?= esc(set_value('subtitulo', isset($post) ? $post->subtitulo : '') ) ?>" class="form-control"
            placeholder="Digite o subtítulo">
    </div>

    <div class="mb-3">
        <label for="conteudo" class="form-label">Conteúdo</label>
        <textarea id="conteudo" rows="5" name="conteudo" class="form-control"
            placeholder="Digite o conteúdo da postagem"><?= esc(set_value('conteudo', isset($post) ? $post->conteudo : '') ) ?></textarea>
    </div>

    <div class="mb-2">
        <label for="marcador" class="form-label">Marcador</label>
        <select id="marcador" class="form-select" name="marcador_id">
            <option selected disabled style="color: gray;">Selecione...</option>
            <?php foreach($marcadores as $marcador): ?>
            <option value="<?= $marcador->id ?>"
                <?= (isset($post->id) && $post->marcador_id == $marcador->id) ? 'selected' : '' ?>>
                <?= $marcador->nome; ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="d-flex justify-content-end">
        <input type="submit" value="Confirmar" class="btn btn-primary" onclick="return confirm('Salvar?')" />
    </div>

    <?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger mt-3">
        <ul class="mb-0">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
            <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
    <?php endif; ?>
</form>