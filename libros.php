<?php
require_once "config/db.php";

$busqueda = "";
$filtroTipo = "";

// BUSCAR POR TÍTULO
if (!empty($_GET["q"])) {
    $busqueda = $_GET["q"];
}

// FILTRAR POR TIPO
if (!empty($_GET["tipo"])) {
    $filtroTipo = $_GET["tipo"];
}

$sql = "SELECT * FROM titulos WHERE 1=1";

// Agregar filtro por búsqueda
if ($busqueda !== "") {
    $sql .= " AND titulo LIKE :search";
}

// Agregar filtro por tipo
if ($filtroTipo !== "") {
    $sql .= " AND tipo = :tipo";
}

$stmt = $pdo->prepare($sql);

// Pasar parámetros según existan
if ($busqueda !== "") {
    $stmt->bindValue(":search", "%" . $busqueda . "%");
}
if ($filtroTipo !== "") {
    $stmt->bindValue(":tipo", $filtroTipo);
}

$stmt->execute();
$libros = $stmt->fetchAll();

// Obtener lista única de categorías/tipos
$tiposQuery = $pdo->query("SELECT DISTINCT tipo FROM titulos");
$tipos = $tiposQuery->fetchAll();
?>

<?php include "includes/header.php"; ?>

<main class="container mt-4">

    <h2>Listado de Libros</h2>

    <!-- Barra de búsqueda -->
    <form method="GET" class="row g-3 mt-2 mb-4">
        <div class="col-md-6">
            <input type="text" name="q" class="form-control"
                placeholder="Buscar por título..."
                value="<?php echo htmlspecialchars($busqueda); ?>">
        </div>

        <!-- Filtro por tipo -->
        <div class="col-md-4">
            <select name="tipo" class="form-select">
                <option value="">Filtrar por categoría</option>

                <?php foreach ($tipos as $t): ?>
                    <option value="<?= $t['tipo'] ?>"
                        <?= ($filtroTipo == $t['tipo']) ? "selected" : "" ?>>
                        <?= ucfirst($t['tipo']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-md-2">
            <button class="btn btn-primary w-100">Buscar</button>
        </div>
    </form>

    <!-- Resultados -->
    <div class="row">
        <?php foreach ($libros as $libro): ?>
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">

                    <div class="card-body">
                        <h5 class="card-title"><?= $libro['titulo']; ?></h5>
                        <p class="text-muted">Tipo: <?= $libro['tipo']; ?></p>
                        <p class="fw-bold text-primary">$<?= number_format($libro['precio'], 2); ?></p>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    </div>

</main>

<?php include "includes/footer.php"; ?>
