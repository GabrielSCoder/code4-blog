<div class="table-responsive flex-grow-1">
    <div class="text-end">
        <button class="text-white bg-primary border-0 rounded-2 p-2"
            onclick="window.location.href='<?= site_url('/postagem/criar') ?>'">Adicionar Postagem</button>
    </div><br />
    <table class="table table-striped table-hover align-middle shadow-sm rounded">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Título</th>
                <th scope="col">Data de cadastro</th>
                <th scope="col" class="text-center">Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($posts) && !empty($posts)): ?>
            <?php foreach($posts as $post): ?>
            <tr>
                <td><?= esc($post->id); ?></td>
                <td><?= esc($post->titulo); ?></td>
                <td><?= esc($post->data_cadastro); ?></td>
                <td class="text-center">
                    <a href="<?= site_url('postagem/editar/'.$post->id) ?>"
                        class="btn btn-sm btn-warning me-2">Editar</a>
                    <a href="<?= site_url('postagem/excluir/'.$post->id) ?>" class="btn btn-sm btn-danger"
                        onclick="return(confirm('Deseja excluir?'))">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center mt-3">
    <?= $pager->links('default', 'bootstrap_full') ?>
</div>