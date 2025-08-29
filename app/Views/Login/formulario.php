<div class="d-flex flex-column flex-grow-1 justify-content-center align-items-center w-100 h-100">
    <form class="d-flex flex-column p-4 rounded" style="width: 300px;" method="post" action="<?= $action ?>">
        <label>Usuário</label>
        <input type="text" name="usuario" required class="mb-2 form-control" />

        <label>Senha</label>
        <input type="password" name="senha" required class="mb-3 form-control" />

        <input type="submit" value="Confirmar" class="btn bg-primary text-white" />
    </form>
</div>