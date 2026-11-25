<?php
require_once __DIR__ . '/classes/Line.php';

$lines = [
    new Line(80, 100, 260, 170, '#ef4444'),
    new Line(260, 170, 430, 90, '#3b82f6'),
];

$lines[1]->move(-30, 20);
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Figma</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            background: #f3f4f6;
            font-family: Arial, sans-serif;
        }

        .canvas {
            position: relative;
            width: 560px;
            height: 320px;
            overflow: hidden;
            border: 1px solid #d1d5db;
            border-radius: 12px;
            background: white;
            box-shadow: 0 12px 30px rgb(0 0 0 / 10%);
        }

        .line {
            position: absolute;
            height: 4px;
            border-radius: 999px;
            transform-origin: 0 50%;
        }
    </style>
</head>
<body>
    <main class="canvas" aria-label="Voorbeeld van Shape-lijnen">
        <?php foreach ($lines as $line): ?>
            <div class="line" style="<?= $line->getCssStyle() ?>" aria-hidden="true"></div>
        <?php endforeach; ?>
    </main>
</body>
</html>