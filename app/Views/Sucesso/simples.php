<div class="d-flex flex-grow-1 w-100 h-100 justify-content-center align-items-center flex-column ">
    <img src="<?= base_url('assets/img/confirm-svgrepo-com.svg') ?>" height="100" width="100" alt="confirm-img" /><br />
    <p class="text-black">
        <?= $success ?>
    </p>
    <button class="bg-primary text-white rounded-3 border-0" onclick="window.location.href='<?= site_url('/') ?>'">
        Voltar ao início
    </button>
</div>