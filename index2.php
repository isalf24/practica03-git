<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Personaje</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Detalles del Personaje</h1>

    <?php
    ini_set('display_errors', 1);
    $id = htmlspecialchars($_GET['id']);
    $api_url = "https://dragonball-api.com/api/characters/$id";
    $file = file_get_contents($api_url);
    $data = json_decode($file, true);

    if ($data): ?>
        <div class="card">
            <img src="<?= htmlspecialchars($data['image']) ?>" alt="<?= htmlspecialchars($data['name']) ?>">
            <div class="card-details">
                <h2><?= htmlspecialchars($data['name']) ?></h2>
                <p><strong>Raza:</strong> <?= htmlspecialchars($data['race']) ?></p>
                <p><strong>Género:</strong> <?= htmlspecialchars($data['gender']) ?></p>
                <p><strong>Ki:</strong> <?= htmlspecialchars($data['ki']) ?></p>
                <p><strong>Max Ki:</strong> <?= htmlspecialchars($data['maxKi']) ?></p>
                <p><strong>Afiliación:</strong> <?= htmlspecialchars($data['affiliation']) ?></p>
                <p><strong>Descripción:</strong> <?= htmlspecialchars($data['description']) ?></p>
                <h3>Planeta de Origen</h3>
                <p><strong>Nombre:</strong> <?= htmlspecialchars($data['originPlanet']['name']) ?></p>
                <p><strong>Descripción:</strong> <?= htmlspecialchars($data['originPlanet']['description']) ?></p>
                <img src="<?= htmlspecialchars($data['originPlanet']['image']) ?>" alt="<?= htmlspecialchars($data['originPlanet']['name']) ?>" style="width: 200px; height: auto;">
            </div>
        </div>

        <div class="transformations">
            <h2>Transformaciones</h2>
            <?php foreach ($data['transformations'] as $transformation): ?>
                <div class="transformation-card">
                    <img src="<?= htmlspecialchars($transformation['image']) ?>" alt="<?= htmlspecialchars($transformation['name']) ?>">
                    <div>
                        <h3><?= htmlspecialchars($transformation['name']) ?></h3>
                        <p><strong>Ki:</strong> <?= htmlspecialchars($transformation['ki']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <a href="index.php" class="btn">Volver a la lista</a>
    <?php else: ?>
        <p>El personaje no fue encontrado.</p>
    <?php endif; ?>
</body>
</html>