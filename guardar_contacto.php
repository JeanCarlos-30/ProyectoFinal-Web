<?php
require_once "config/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $sql = "INSERT INTO contacto (nombre, correo, asunto, comentario)
            VALUES (:nombre, :correo, :asunto, :comentario)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":nombre" => $_POST["nombre"],
        ":correo" => $_POST["correo"],
        ":asunto" => $_POST["asunto"],
        ":comentario" => $_POST["comentario"]
    ]);

    echo "<script>
        alert('¡Mensaje enviado correctamente!');
        window.location.href = 'contacto.php';
    </script>";
}
?>
