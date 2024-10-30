<?php
session_start();
include 'includes/header.inc';
include 'includes/db_connect.inc';

// Fetch the latest 4 pets to display in the carousel
$query = "SELECT * FROM pets ORDER BY id DESC LIMIT 4";
$stmt = $pdo->prepare($query);
$stmt->execute();
$pets = $stmt->fetchAll();
?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Welcome to Pets Victoria</h1>

    <!-- Bootstrap Carousel -->
    <div id="petCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            $active = 'active'; // Set the first slide as active
            foreach ($pets as $pet): ?>
                <div class="carousel-item <?php echo $active; ?>">
                    <img src="images/<?php echo htmlspecialchars($pet['image']); ?>" 
                         class="d-block w-100" 
                         alt="<?php echo htmlspecialchars($pet['name']); ?>" 
                         style="width: 100%; height: 500px; object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?php echo htmlspecialchars($pet['name']); ?></h5>
                        <p><?php echo htmlspecialchars($pet['type']); ?> - <?php echo htmlspecialchars($pet['age']); ?> months</p>
                    </div>
                </div>
            <?php 
            $active = ''; // Only the first slide should be active
            endforeach; ?>
        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#petCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#petCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="text-center mt-5">
        <p>Discover amazing pets looking for a home.</p>
        <a href="gallery.php" class="btn btn-primary">View Gallery</a>
    </div>
</div>

<!-- Custom CSS to change arrow icon colors -->
<style>
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: blue; /* Change the color of icons to blue */
        border-radius: 50%; /* Optional: Make the icon circular */
        width: 50px;
        height: 50px;
    }
</style>

<?php include 'includes/footer.inc'; ?>
