<?php include __DIR__ . '../../layouts/header.php'; ?>

<div class="container">
    <h2>Elige tu Plan</h2>
    <form method="POST" action="">
        <label>Selecciona un plan:
            <select name="id_plan" required>
                <?php foreach ($plans as $plan): ?>
                    <option value="<?php echo $plan['id_plan']; ?>">
                        <?php echo $plan['nombre_plan'] . " (" . $plan['duracion'] . ") - $" . $plan['precio']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label><br>
        <button type="submit">Suscribirse</button>
    </form>
</div>

<?php include __DIR__ . '../../layouts/footer.php'; ?>