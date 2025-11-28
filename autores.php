<?php 
include "includes/header.php"; 
require_once "config/db.php";

$stmt = $pdo->query("SELECT nombre, apellido, ciudad FROM autores");
$autores = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2 class="mb-4 text-center">Listado de Autores</h2>

<div class="row">
    <?php foreach ($autores as $autor): ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <h5><?= $autor["nombre"] . " " . $autor["apellido"]; ?></h5>
                <p><strong>Ciudad:</strong> <?= $autor["ciudad"]; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php include "includes/footer.php"; ?>
