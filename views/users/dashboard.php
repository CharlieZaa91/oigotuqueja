<?php include __DIR__ . '../../layouts/header.php'; ?>

<div class="container">
    <h2>Bienvenido, <?php echo $_SESSION['tipo_usuario']; ?>!</h2>
    <p>Esta es tu página de inicio.</p>
    <a href="/oigotuqueja/public/?action=logout">Cerrar Sesión</a>
</div>

<?php include __DIR__ . '../../layouts/footer.php'; ?>