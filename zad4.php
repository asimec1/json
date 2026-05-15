<?php
$json = '{
  "ime": "Petar",
  "prezime": "Kovač",
  "starost": 30,
  "auti": [
    {
      "marka": "Ford",
      "models": ["Mustang", "Focus", "Fiesta"],
      "godina": 2018,
      "boja": "crvena",
      "registriran": true
    },
    {
      "marka": "BMW",
      "models": ["320", "X1", "X6"],
      "godina": 2020,
      "boja": "crna",
      "registriran": true
    },
    {
      "marka": "Fiat",
      "models": ["500", "Panda"],
      "godina": 2015,
      "boja": "bijela",
      "registriran": false
    },
    {
      "marka": "Opel",
      "models": ["Astra", "Corsa", "Insignia"],
      "godina": 2012,
      "boja": "siva",
      "registriran": false
    }
  ]
}';

$podatci = json_decode($json, true);

$brojPrikazanih = 0;
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtriranje JSON podataka</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #1f2937;
            padding: 40px;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
        }

        .header {
            background: #ffffff;
            padding: 30px;
            border-radius: 18px;
            margin-bottom: 30px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            border-left: 8px solid #2563eb;
        }

        .header h1 {
            margin: 0 0 10px 0;
            font-size: 34px;
            color: #111827;
        }

        .header p {
            margin: 8px 0;
            font-size: 18px;
            color: #4b5563;
        }

        .osoba {
            margin-top: 20px;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .osoba span {
            background: #eff6ff;
            color: #1d4ed8;
            padding: 10px 14px;
            border-radius: 999px;
            font-weight: bold;
        }

        .info {
            background: #fff7ed;
            border-left: 6px solid #f97316;
            padding: 18px 22px;
            border-radius: 14px;
            margin-bottom: 30px;
            font-size: 17px;
        }

        .auti {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
        }

        .auto-kartica {
            background: #ffffff;
            border-radius: 18px;
            padding: 26px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            border-top: 7px solid #16a34a;
        }

        .auto-kartica h2 {
            margin: 0 0 18px 0;
            font-size: 28px;
            color: #111827;
        }

        .auto-kartica p {
            font-size: 18px;
            margin: 10px 0;
        }

        .oznaka {
            display: inline-block;
            margin-top: 12px;
            padding: 8px 14px;
            border-radius: 999px;
            background: #dcfce7;
            color: #166534;
            font-weight: bold;
            font-size: 15px;
        }

        .modeli {
            margin-top: 18px;
            padding: 18px;
            background: #f8fafc;
            border-radius: 14px;
        }

        .modeli h3 {
            margin: 0 0 12px 0;
            font-size: 20px;
            color: #334155;
        }

        .modeli ul {
            margin: 0;
            padding-left: 22px;
        }

        .modeli li {
            font-size: 17px;
            margin-bottom: 6px;
        }

        .rezultat {
            margin-top: 30px;
            background: #ecfdf5;
            border-left: 6px solid #16a34a;
            padding: 18px 22px;
            border-radius: 14px;
            font-size: 18px;
            font-weight: bold;
            color: #166534;
        }

        .nema-rezultata {
            background: #fee2e2;
            border-left: 6px solid #dc2626;
            padding: 20px;
            border-radius: 14px;
            font-size: 18px;
            color: #991b1b;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            body {
                padding: 22px;
            }

            .header h1 {
                font-size: 30px;
            }

            .header p {
                font-size: 18px;
            }

            .auti {
                grid-template-columns: 1fr;
            }

            .auto-kartica {
                padding: 22px;
            }

            .auto-kartica h2 {
                font-size: 26px;
            }

            .auto-kartica p,
            .modeli li {
                font-size: 18px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 16px;
            }

            .header {
                padding: 22px;
            }

            .header h1 {
                font-size: 28px;
            }

            .osoba {
                flex-direction: column;
            }

            .osoba span {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Filtriranje JSON podataka</h1>
        <p>Prikazuju se samo automobili koji su registrirani.</p>

        <div class="osoba">
            <span>Ime: <?php echo $podatci["ime"]; ?></span>
            <span>Prezime: <?php echo $podatci["prezime"]; ?></span>
            <span>Starost: <?php echo $podatci["starost"]; ?> godina</span>
        </div>
    </div>

    <div class="info">
        Automobili koji nisu registrirani ne brišu se iz JSON dokumenta.
        Oni se samo ne prikazuju u rezultatu.
    </div>

    <div class="auti">

        <?php foreach ($podatci["auti"] as $auto): ?>

            <?php if ($auto["registriran"] == true): ?>

                <?php $brojPrikazanih++; ?>

                <div class="auto-kartica">
                    <h2><?php echo $auto["marka"]; ?></h2>

                    <p><strong>Godina proizvodnje:</strong> <?php echo $auto["godina"]; ?></p>
                    <p><strong>Boja:</strong> <?php echo $auto["boja"]; ?></p>

                    <span class="oznaka">Registriran</span>

                    <div class="modeli">
                        <h3>Modeli</h3>

                        <ul>
                            <?php foreach ($auto["models"] as $model): ?>
                                <li><?php echo $model; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

            <?php endif; ?>

        <?php endforeach; ?>

    </div>

    <?php if ($brojPrikazanih > 0): ?>
        <div class="rezultat">
            Ukupan broj prikazanih automobila: <?php echo $brojPrikazanih; ?>
        </div>
    <?php else: ?>
        <div class="nema-rezultata">
            Nema automobila koji zadovoljavaju uvjet filtriranja.
        </div>
    <?php endif; ?>

</div>

</body>
</html>