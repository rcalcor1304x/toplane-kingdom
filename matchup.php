<?php

$matchups = [

    "fiora" => [
        "name" => "Fiora",
        "difficulty" => "Extreme",
        "image" => "https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Fiora_0.jpg",
        "win_condition" => "Survive lane and force grouped teamfights later.",
        "runes" => [
            "Grasp of the Undying",
            "Demolish",
            "Second Wind",
            "Overgrowth"
        ],
        "items" => [
            "Doran Shield",
            "Bramble Vest",
            "Plated Steelcaps"
        ],
        "tips" => [
            "Never use E predictably.",
            "Rush armor immediately.",
            "Avoid extended trades.",
            "Fight near walls carefully."
        ],
        "powerspikes" => [
            "Bramble Vest",
            "Level 13",
            "Jak'Sho"
        ]
    ],

    "camille" => [
        "name" => "Camille",
        "difficulty" => "Hard",
        "image" => "https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Camille_0.jpg",
        "win_condition" => "Neutralize lane and outscale in teamfights.",
        "runes" => [
            "Grasp of the Undying",
            "Bone Plating",
            "Overgrowth"
        ],
        "items" => [
            "Doran Shield",
            "Bami Cinder",
            "Tabis"
        ],
        "tips" => [
            "Save W for her engage.",
            "Respect Divine Sunderer timing.",
            "Short trades are better."
        ],
        "powerspikes" => [
            "Bami Cinder",
            "Level 13"
        ]
    ],

    "darius" => [
        "name" => "Darius",
        "difficulty" => "Hard",
        "image" => "https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Darius_0.jpg",
        "win_condition" => "Avoid long fights and farm safely.",
        "runes" => [
            "Grasp",
            "Second Wind",
            "Unflinching"
        ],
        "items" => [
            "Doran Shield",
            "Bramble Vest"
        ],
        "tips" => [
            "Never fight with 5 stacks.",
            "Farm near tower.",
            "Ping jungle assistance early."
        ],
        "powerspikes" => [
            "Tabis",
            "Jak'Sho"
        ]
    ]
];

$champ = strtolower($_GET['champ'] ?? '');

if (!isset($matchups[$champ])) {
    die("Matchup not found.");
}

$data = $matchups[$champ];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ornn vs <?php echo $data['name']; ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap" rel="stylesheet">

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #050505;
            color: white;
            font-family: 'Inter', sans-serif;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .navbar {
            width: 100%;
            border-bottom: 1px solid #1f1f1f;
            background: rgba(0,0,0,0.9);
            backdrop-filter: blur(10px);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar-content {
            max-width: 1400px;
            margin: auto;
            padding: 18px 24px;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .navbar img {
            width: 54px;
            height: 54px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #f97316;
        }

        .logo-title {
            font-size: 1.4rem;
            font-weight: 900;
            color: #f97316;
        }

        .hero {
            height: 420px;
            position: relative;
            overflow: hidden;
        }

        .hero img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.25;
        }

        .hero-overlay {
            position: relative;
            z-index: 2;
            max-width: 1400px;
            margin: auto;
            height: 100%;
            display: flex;
            align-items: flex-end;
            padding: 60px 24px;
        }

        .hero h1 {
            font-size: 5rem;
            font-weight: 900;
            line-height: 1;
        }

        .difficulty {
            display: inline-block;
            margin-top: 18px;
            padding: 10px 16px;
            border-radius: 999px;
            background: rgba(249,115,22,0.15);
            color: #f97316;
            font-weight: 700;
        }

        .container {
            max-width: 1400px;
            margin: auto;
            padding: 60px 24px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 24px;
        }

        .section {
            background: #0f0f0f;
            border: 1px solid #1f1f1f;
            border-radius: 22px;
            padding: 28px;
        }

        .section h2 {
            color: #f97316;
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        .section p {
            color: #ccc;
            line-height: 1.7;
        }

        ul {
            list-style: none;
        }

        li {
            color: #ccc;
            margin-bottom: 14px;
            line-height: 1.6;
        }

        li::before {
            content: '•';
            color: #f97316;
            margin-right: 10px;
        }

        .full {
            grid-column: 1 / -1;
        }

        .back-button {
            display: inline-block;
            margin-top: 18px;
            color: #999;
            transition: 0.2s ease;
        }

        .back-button:hover {
            color: #f97316;
        }

        @media(max-width: 768px) {

            .hero {
                height: 320px;
            }

            .hero h1 {
                font-size: 2.8rem;
            }

        }

    </style>
</head>
<body>

<nav class="navbar">
    <div class="navbar-content">

        <img src="https://ddragon.leagueoflegends.com/cdn/img/champion/splash/Ornn_0.jpg">

        <div>
            <div class="logo-title">ORNN MATCHUPS</div>

            <a href="index.php" class="back-button">
                ← Back to Homepage
            </a>
        </div>

    </div>
</nav>

<section class="hero">

    <img src="<?php echo $data['image']; ?>">

    <div class="hero-overlay">

        <div>

            <h1>
                Ornn vs <?php echo $data['name']; ?>
            </h1>

            <div class="difficulty">
                <?php echo $data['difficulty']; ?>
            </div>

        </div>

    </div>

</section>

<section class="container">

    <div class="section">

        <h2>Win Condition</h2>

        <p>
            <?php echo $data['win_condition']; ?>
        </p>

    </div>

    <div class="section">

        <h2>Recommended Runes</h2>

        <ul>

            <?php foreach($data['runes'] as $rune): ?>

                <li><?php echo $rune; ?></li>

            <?php endforeach; ?>

        </ul>

    </div>

    <div class="section">

        <h2>Starter Items</h2>

        <ul>

            <?php foreach($data['items'] as $item): ?>

                <li><?php echo $item; ?></li>

            <?php endforeach; ?>

        </ul>

    </div>

    <div class="section">

        <h2>Powerspikes</h2>

        <ul>

            <?php foreach($data['powerspikes'] as $spike): ?>

                <li><?php echo $spike; ?></li>

            <?php endforeach; ?>

        </ul>

    </div>

    <div class="section full">

        <h2>Lane Tips</h2>

        <ul>

            <?php foreach($data['tips'] as $tip): ?>

                <li><?php echo $tip; ?></li>

            <?php endforeach; ?>

        </ul>

    </div>

</section>

</body>
</html>
