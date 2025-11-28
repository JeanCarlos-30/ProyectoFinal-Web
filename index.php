<?php include "includes/header.php"; ?>

<h2 class="text-center mb-4">Bienvenido a la Librería Online</h2>

<!-- CARRUSEL -->
<div id="carouselExample" class="carousel slide mb-5" data-bs-ride="carousel">
    <div class="carousel-inner">

        <div class="carousel-item active">
            <img src="assets/img/banner1.jpg" alt="Banner" class="d-block w-100">
        </div>

        <div class="carousel-item">
            <img src="assets/img/banner2.jpg" alt="Banner" class="d-block w-100">
        </div>

        <div class="carousel-item">
            <img src="assets/img/banner3.jpg" alt="Banner" class="d-block w-100">
        </div>

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<?php include "includes/footer.php"; ?>
