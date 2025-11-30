<?php
// Asegura que el método sea POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

// --- CONFIGURACIÓN DEL QUIZ --- //
// Cada opción suma puntos a personajes distintos.


$scores = [
    "Isagi" => 0,
    "Bachira" => 0,
    "Kunigami" => 0,
    "Chigiri" => 0,
    "Nagi" => 0,
    "Rin" => 0,
    "Barou" => 0,
    "Raichi" => 0,
    "Tokimitsu" => 0,
    "Kaiser" => 0,
    "Ness" => 0,
    "Reo" => 0,
    "Gagamaru" => 0,
    "Kuon" => 0,
    "Niko" => 0,
    "Igarashi" => 0,
    "Zantetsu" => 0,
    "Otoya" => 0,
    "Yukimiya" => 0,
    "Aryu" => 0,
    "Kiyora" => 0,
    "Kurona" => 0,
    "Shidou" => 0,
    "Karasu" => 0,
    "Hiori" => 0,
    "Sae" => 0,
    "Aiku" => 0,
    "Grim" => 0,
    "Noa" => 0,
    "Lavinho" => 0,
    "Prince" => 0,
    "Agi" => 0,
    "Snuffy" => 0,
    "Lorenzo" => 0,
    "Loki" => 0,
    "Charles" => 0,
    "Onazi" => 0,
    "Bunny" => 0
];

// Mapeo de opciones → puntos por personaje
$points = [
    "q1" => [
        "A" => ["Isagi" => 1, "Kurona" => 1],
        "B" => ["Bachira" => 1, "Reo" => 1],
        "C" => ["Rin" => 1, "Shidou" => 1]
    ],
    "q2" => [
        "A" => ["Nagi" => 1, "Hiori" => 1],
        "B" => ["Barou" => 1, "Agi" => 1],
        "C" => ["Tokimitsu" => 1, "Igarashi" => 1]
    ],
    "q3" => [
        "A" => ["Chigiri" => 1, "Yukimiya" => 1],
        "B" => ["Kunigami" => 1, "Gagamaru" => 1],
        "C" => ["Zantetsu" => 1, "Otoya" => 1]
    ],
    "q4" => [
        "A" => ["Niko" => 1, "Aryu" => 1],
        "B" => ["Kaiser" => 1, "Sae" => 1],
        "C" => ["Ness" => 1, "Prince" => 1]
    ],
    "q5" => [
        "A" => ["Karasu" => 1, "Loki" => 1],
        "B" => ["Raichi" => 1, "Aiku" => 1],
        "C" => ["Snuffy" => 1, "Charles" => 1]
    ],
    "q6" => [
        "A" => ["Noa" => 1, "Lavinho" => 1],
        "B" => ["Barou" => 1, "Lorenzo" => 1],
        "C" => ["Bunny" => 1, "Onazi" => 1]
    ],
    "q7" => [
        "A" => ["Isagi" => 1, "Reo" => 1],
        "B" => ["Rin" => 1, "Agi" => 1],
        "C" => ["Bachira" => 1, "Gagamaru" => 1]
    ],
    "q8" => [
        "A" => ["Chigiri" => 1, "Yukimiya" => 1],
        "B" => ["Tokimitsu" => 1, "Igarashi" => 1],
        "C" => ["Sae" => 1, "Prince" => 1]
    ],
    "q9" => [
        "A" => ["Hiori" => 1, "Kurona" => 1],
        "B" => ["Barou" => 1, "Loki" => 1],
        "C" => ["Karasu" => 1, "Onazi" => 1]
    ],
    "q10" => [
        "A" => ["Nagi" => 1, "Reo" => 1],
        "B" => ["Kaiser" => 1, "Shidou" => 1],
        "C" => ["Kunigami" => 1, "Raichi" => 1]
    ],
    "q11" => [
        "A" => ["Niko" => 1, "Kiyora" => 1],
        "B" => ["Aiku" => 1, "Charles" => 1],
        "C" => ["Lorenzo" => 1, "Bunny" => 1]
    ],
    "q12" => [
        "A" => ["Gagamaru" => 1, "Otoya" => 1],
        "B" => ["Aryu" => 1, "Zantetsu" => 1],
        "C" => ["Noa" => 1, "Snuffy" => 1]
    ],
    "q13" => [
        "A" => ["Isagi" => 1, "Hiori" => 1],
        "B" => ["Rin" => 1, "Kaiser" => 1],
        "C" => ["Barou" => 1, "Prince" => 1]
    ],
    "q14" => [
        "A" => ["Bachira" => 1, "Yukimiya" => 1],
        "B" => ["Reo" => 1, "Agi" => 1],
        "C" => ["Shidou" => 1, "Loki" => 1]
    ],
    "q15" => [
        "A" => ["Kunigami" => 1, "Charles" => 1],
        "B" => ["Chigiri" => 1, "Kiyora" => 1],
        "C" => ["Tokimitsu" => 1, "Onazi" => 1]
    ],
    "q16" => [
        "A" => ["Nagi" => 1, "Karasu" => 1],
        "B" => ["Gagamaru" => 1, "Lorenzo" => 1],
        "C" => ["Aryu" => 1, "Snuffy" => 1]
    ],
    "q17" => [
        "A" => ["Niko" => 1, "Raichi" => 1],
        "B" => ["Aiku" => 1, "Kaiser" => 1],
        "C" => ["Reo" => 1, "Lavinho" => 1]
    ],
    "q18" => [
        "A" => ["Hiori" => 1, "Otoya" => 1],
        "B" => ["Barou" => 1, "Charles" => 1],
        "C" => ["Shidou" => 1, "Prince" => 1]
    ],
    "q19" => [
        "A" => ["Isagi" => 1, "Kurona" => 1],
        "B" => ["Rin" => 1, "Sae" => 1],
        "C" => ["Nagi" => 1, "Bachira" => 1]
    ],
    "q20" => [
        "A" => ["Noa" => 1, "Loki" => 1],
        "B" => ["Snuffy" => 1, "Agi" => 1],
        "C" => ["Bunny" => 1, "Onazi" => 1]
    ],
];


// --- PROCESAR RESPUESTAS --- //

foreach ($points as $question => $answers) {

    if (!isset($_POST[$question])) {
        continue; // si alguna no está marcada, simplemente se ignora (o puedes redirigir)
    }

    $choice = $_POST[$question];

    if (isset($answers[$choice])) {
        foreach ($answers[$choice] as $character => $value) {
            $scores[$character] += $value;
        }
    }
}

// --- OBTENER PERSONAJE FINAL --- //
$finalCharacter = array_keys($scores, max($scores))[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Blue Lock Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="result-container">
    <h1>Your Blue Lock Character Is:</h1>
    <h2 class="character-name"><?php echo $finalCharacter; ?></h2>

    <p class="description">
        <?php
            // Descripciones personalizadas
            $descriptions = [
                "Isagi" => "Strategic, analytical, always growing.",
                "Bachira" => "Creative, unpredictable, joyful striker.",
                "Kunigami" => "Honorable, disciplined, heroic playstyle.",
                "Chigiri" => "Fast, elegant, unstoppable once motivated.",
                "Nagi" => "Genius-level talent with effortless gameplay.",
                "Rin" => "Cold, focused, obsessive about winning.",
                "Barou" => "Lone king, dominant ego, pure power.",
                "Raichi" => "Aggressive, impulsive, high stamina.",
                "Tokimitsu" => "Anxious but extremely strong under pressure."
            ];

            echo $descriptions[$finalCharacter];
        ?>
    </p>

    <a href="index.php" class="retry-btn">Try Again</a>
</div>

</body>
</html>
