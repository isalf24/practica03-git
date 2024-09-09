<?php
ini_set('display_errors', 1);
$api_url = 'https://dragonball-api.com/api/characters?limit=1000';
$file = file_get_contents($api_url);
$data = json_decode($file, true);

foreach ($data['items'] as $item): ?>
    <div class="small-card">
        <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
        <h3><?= htmlspecialchars($item['name']) ?></h3>
        <p><strong>Raza:</strong> <?= htmlspecialchars($item['race']) ?></p>
        <a href="index2.php?id=<?= htmlspecialchars($item['id']) ?>">Ver detalles</a>
    </div>
<?php endforeach; ?>