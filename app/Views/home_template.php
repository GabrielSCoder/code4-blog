<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$titulo?></title>
    <link rel="stylesheet" href="<?=base_url('assets/bootstrap/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/personal/css/panel.css')?>">
    <style>
    html {
        overflow-y: scroll;
    }
    </style>
</head>

<body class="bg-primary d-flex flex-column min-vh-100">

    <header
        class="text-white text-center py-4 d-flex flex-row justify-content-between align-items-center px-4 position-relative"
        style="height: 130px;">
        <div></div>
        <div class="title">
            <h2>Meu Blog pessoal</h2>
            <h4>this is a blog</h4>
        </div>

        <div class="d-flex flex-column">
            <?php
            $session = session(); 
            if ($session->has("usuario_id")):
        ?>
            <h5>Olá Gabriel</h5>
            <button onclick="window.location.href='<?= site_url('/auth/logoff') ?>'">Sair</button>
            <?php endif; ?>
        </div>

    </header>

    <main class="flex-grow-1 d-flex justify-content-center align-items-start py-4">
        <div class="w-75 d-flex flex-column bg-white rounded-2 p-5 shadow" style="min-height: 70vh;">
            <?= $content ?>
        </div>
    </main>

    <footer class="text-white text-center py-3">
        Desenvolvido por <strong>Gabriel Sena</strong>. 2025
    </footer>

    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/personal/js/hello.js') ?>"></script>

</body>


</html>