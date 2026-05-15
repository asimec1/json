<?php
$json = '{
  "grad": "Zagreb",
  "temperatura": 22,
  "vrijeme": "sunčano",
  "vlaznost_zraka": 55
}';

$podatci = json_decode($json, true);

$pozadina = "";

if ($podatci["vrijeme"] == "sunčano") {
    $pozadina = "suncano";
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">

    <!-- Važno za responzivni prikaz na mobitelu -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Vremenska prognoza</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            min-height: 100vh;
            padding: 40px;
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
        }

        .suncano {
            background-image: url("bg-sunny.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .kartica {
            width: 100%;
            max-width: 460px;
            padding: 28px;
            border-radius: 16px;
            background-color: rgba(255, 255, 255, 0.88);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.25);
        }

        h1 {
            margin-top: 0;
            margin-bottom: 22px;
            font-size: 32px;
            line-height: 1.2;
        }

        p {
            font-size: 18px;
            line-height: 1.5;
            margin: 12px 0;
        }

        .label {
            font-weight: bold;
        }

        /* Prikaz za tablete i manje ekrane */
        @media (max-width: 768px) {
            body {
                padding: 24px;
                align-items: center;
                justify-content: center;
            }

            .kartica {
                max-width: 100%;
                padding: 26px;
            }

            h1 {
                font-size: 30px;
            }

            p {
                font-size: 20px;
            }
        }

        /* Prikaz za mobitele */
        @media (max-width: 480px) {
            body {
                padding: 16px;
                align-items: center;
                justify-content: center;
            }

            .kartica {
                width: 100%;
                padding: 24px;
                border-radius: 14px;
            }

            h1 {
                font-size: 28px;
                margin-bottom: 20px;
            }

            p {
                font-size: 20px;
                line-height: 1.6;
            }
        }
    </style>
</head>

<body class="<?php echo $pozadina; ?>">

    <div class="kartica">
        <h1>Vremenska prognoza</h1>

        <p><span class="label">Grad:</span> <?php echo $podatci["grad"]; ?></p>
        <p><span class="label">Temperatura:</span> <?php echo $podatci["temperatura"]; ?> °C</p>
        <p><span class="label">Vrijeme:</span> <?php echo $podatci["vrijeme"]; ?></p>
        <p><span class="label">Vlažnost zraka:</span> <?php echo $podatci["vlaznost_zraka"]; ?> %</p>
    </div>

</body>
</html>