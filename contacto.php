<?php include "includes/header.php"; ?>

<h2 class="mb-4 text-center">Formulario de Contacto</h2>

<div class="card p-4 shadow-sm">
    <form action="guardar_contacto.php" method="POST">

        <label class="mb-1">Nombre completo</label>
        <input type="text" name="nombre" class="form-control mb-3" required>

        <label class="mb-1">Correo</label>
        <input type="email" name="correo" class="form-control mb-3" required>

        <label class="mb-1">Asunto</label>
        <input type="text" name="asunto" class="form-control mb-3" required>

        <label class="mb-1">Comentario</label>
        <textarea name="comentario" class="form-control mb-3" rows="4" required></textarea>

        <button class="btn btn-primary w-100">Enviar</button>

    </form>
</div>

<?php include "includes/footer.php"; ?>
