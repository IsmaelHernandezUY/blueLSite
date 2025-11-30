<?php

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
        continue; // si alguna no está marcada, simplemente se ignora 
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
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="body-results">

<div class="result-container">
    <h1>Your Blue Lock Character Is:</h1>
    <h2 class="character-name"><?php echo $finalCharacter; ?></h2>

    <p class="description">
        <?php
        $descriptions = [
            "Isagi" => "You are strategic, adaptable, and always searching for the best version of yourself. You grow through analysis, reflection, and constant evolution.",
            "Bachira" => "You express yourself through creativity and instinct. You trust your impulses, embrace freedom, and find joy in moving differently from everyone else.",
            "Kunigami" => "You are guided by strong morals and discipline. You work hard, stay loyal to your ideals, and strive to become a heroic version of yourself.",
            "Chigiri" => "You carry elegance, potential, and quiet confidence. Once you overcome doubt, nothing can slow you down—your momentum becomes unstoppable.",
            "Nagi" => "You possess natural talent and a calm mind. You handle challenges effortlessly and often surprise others with how easily things come to you.",
            "Rin" => "You are focused, precise, and deeply committed to your goals. Your drive to win pushes you to analyze everything and constantly aim higher.",
            "Barou" => "You walk your own path with unshakable determination. You rely on your power, pride, and dominance to impose your presence wherever you go.",
            "Raichi" => "You are intense and energetic, with a fiery passion that fuels your actions. You push hard, confront challenges head-on, and refuse to back down.",
            "Tokimitsu" => "You feel pressure deeply, yet you possess hidden strength. When it matters most, you overcome your fears and deliver far beyond expectations.",
            "Kaiser" => "You shine naturally and move with confidence. You love standing out, expressing ambition, and proving your superiority through skill and flair.",
            "Ness" => "You are expressive, loyal, and emotionally driven. You value connection and stay devoted to the people or goals you truly believe in.",
            "Reo" => "You give your all to the things you care about. Ambitious and supportive, you thrive when working toward big dreams and uplifting others along the way.",
            "Gagamaru" => "You react with sharp instincts and adapt quickly. You’re flexible, unpredictable, and always ready to turn a chaotic moment into an advantage.",
            "Kuon" => "You are strategic and pragmatic, willing to make calculated decisions even when they are difficult. You focus on results and efficiency above all.",
            "Niko" => "You prefer observation over noise. Quiet but perceptive, you read situations and people easily, using insight as your biggest strength.",
            "Igarashi" => "You are emotional, honest, and heartfelt. Even when scared, you stay loyal and try your best, valuing sincerity above bravado.",
            "Zantetsu" => "You move with directness and clarity. Simple, fast, and focused, you don’t overthink—once a direction is chosen, you sprint toward it.",
            "Otoya" => "You move smoothly through life, avoiding unnecessary attention. Calm and stealthy, you value precision and staying unnoticed until the right moment.",
            "Yukimiya" => "You seek refinement and constant self-improvement. Stylish and disciplined, you aim to polish every aspect of yourself, inside and out.",
            "Aryu" => "You appreciate beauty, glamour, and elegance. You carry yourself with confidence and strive to be impressive in every way.",
            "Kiyora" => "You are balanced, composed, and adaptable. You adjust to situations smoothly and keep a calm presence even under pressure.",
            "Kurona" => "You thrive through teamwork and synchronization. Efficient and cooperative, you excel when working closely with others toward a shared goal.",
            "Shidou" => "You follow instinct, chaos, and pure desire. Wild and explosive, you embrace unpredictability and enjoy breaking limits.",
            "Karasu" => "You are clever, sharp, and hard to fool. You observe from the shadows, plan your moves, and stay one step ahead of everyone else.",
            "Hiori" => "You are calm, thoughtful, and empathetic. You think carefully, seek harmony, and excel at analyzing situations with clarity.",
            "Sae" => "You radiate natural superiority and high standards. Elegant and controlled, you rely on mastery and refined skill rather than emotion.",
            "Aiku" => "You are charismatic, composed, and persuasive. You handle situations with ease and know how to stay in control no matter the pressure.",
            "Grim" => "You rely on logic, structure, and discipline. Efficient and methodical, you approach everything with a serious and practical mindset.",
            "Noa" => "You are steady, mature, and consistent. You value discipline, long-term growth, and leading by example through reliability.",
            "Lavinho" => "You are expressive and full of passion. You approach life with creativity, rhythm, and a sense of fun that inspires people around you.",
            "Prince" => "You are dramatic, perfectionist, and focused on shining. You seek excellence and enjoy presenting yourself with confidence and flair.",
            "Agi" => "You combine technique and elegance, valuing precision and refinement. You take pride in mastering details and elevating your performance.",
            "Snuffy" => "You are realistic and grounded, with wisdom shaped by experience. You value steady improvement and honest self-reflection.",
            "Lorenzo" => "You are unpredictable, playful, and unconventional. Your chaotic style often hides surprising intelligence and sharp instincts.",
            "Loki" => "You are brilliant, curious, and naturally gifted at understanding things. Calm and analytical, you learn quickly and excel effortlessly.",
            "Charles" => "You are methodical and controlled, always managing the flow of situations. You value timing, order, and careful decision-making.",
            "Onazi" => "You are steady, hardworking, and patient. You believe in improving little by little and trusting the process rather than rushing.",
            "Bunny" => "You are gentle, kind, and soft-spoken, but capable of surprising speed and determination when the moment calls for it."
        ];


        echo $descriptions[$finalCharacter];
        ?>
    </p>

    <a href="index.php" class="retry-btn">Try Again</a>
</div>

</body>
</html>
