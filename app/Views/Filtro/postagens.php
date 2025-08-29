<form method="get" action="<?= site_url('/') ?>" class="d-flex align-items-end gap-3 mb-4">

    <div class="flex-grow-1">
        <label class="form-label fw-semibold" for="pesquisa">
            Pesquisa (título, subtítulo)
        </label>
        <input id="pesquisa" name="pesquisa" type="text" class="form-control" placeholder="Digite para buscar..."
            value="<?= !empty($parametros['pesquisa']) ? $parametros['pesquisa'] : ""  ?>" />
    </div>

    <div style="min-width: 250px;">
        <label for="marcador" class="form-label fw-semibold">Marcador</label>
        <select id="marcador" class="form-select" name="marcador_id">
            <option selected disabled hidden>Selecione...</option>
            <option value="">Todos</option>
            <?php foreach($marcadores as $marcador): ?>
            <option value="<?= $marcador->id ?>"
                <?= (isset($parametros['marcador']) && $parametros['marcador'] == $marcador->id) ? 'selected' : '' ?>>
                <?= esc($marcador->nome); ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Filtrar</button>

</form>