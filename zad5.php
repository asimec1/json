<?php 
$json = file_get_contents('https://api.hnb.hr/tecajn-eur/v3');

// Pretvaranje JSON podataka u PHP polje
$json_data = json_decode($json, true);

// Osnovni podaci za prikaz
$broj_valuta = count($json_data);
$datum_primjene = $json_data[0]["datum_primjene"] ?? "-";
$broj_tecajnice = $json_data[0]["broj_tecajnice"] ?? "-";
		
print '
<!DOCTYPE html>
<html lang="hr">
<head>
	<title>HNB tečajna lista - JSON</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<style>
		body {
			margin: 0;
			font-family: Arial, sans-serif;
			background: #eef2f7;
			color: #1f2937;
		}

		.wrapper {
			width: 92%;
			max-width: 1250px;
			margin: 0 auto;
			padding: 35px 0;
		}

		.hero {
			background: linear-gradient(135deg, #0f172a, #1e3a8a);
			color: #ffffff;
			padding: 32px;
			border-radius: 18px;
			margin-bottom: 25px;
			box-shadow: 0 10px 28px rgba(15, 23, 42, 0.25);
		}

		.hero h1 {
			margin: 0 0 10px 0;
			font-size: 34px;
			font-weight: bold;
		}

		.hero p {
			margin: 0;
			font-size: 17px;
			color: #dbeafe;
			line-height: 1.6;
		}

		.info-grid {
			display: grid;
			grid-template-columns: repeat(3, 1fr);
			gap: 18px;
			margin-bottom: 25px;
		}

		.info-card {
			background: #ffffff;
			border-radius: 14px;
			padding: 20px;
			box-shadow: 0 6px 18px rgba(15, 23, 42, 0.08);
			border-left: 6px solid #2563eb;
		}

		.info-card span {
			display: block;
			font-size: 13px;
			text-transform: uppercase;
			letter-spacing: 0.6px;
			color: #64748b;
			margin-bottom: 7px;
		}

		.info-card strong {
			display: block;
			font-size: 24px;
			color: #0f172a;
		}

		.api-box {
			background: #ffffff;
			border-radius: 14px;
			padding: 18px 22px;
			margin-bottom: 25px;
			box-shadow: 0 6px 18px rgba(15, 23, 42, 0.08);
			border-left: 6px solid #f59e0b;
		}

		.api-box p {
			margin: 0 0 8px 0;
			font-size: 16px;
		}

		.api-box a {
			color: #1d4ed8;
			font-weight: bold;
			word-break: break-all;
		}

		.table-panel {
			background: #ffffff;
			border-radius: 16px;
			padding: 20px;
			box-shadow: 0 8px 24px rgba(15, 23, 42, 0.1);
		}

		.table-title {
			display: flex;
			justify-content: space-between;
			align-items: center;
			gap: 15px;
			margin-bottom: 18px;
		}

		.table-title h2 {
			margin: 0;
			font-size: 26px;
			color: #0f172a;
		}

		.badge-json {
			background: #dcfce7;
			color: #166534;
			padding: 8px 13px;
			border-radius: 999px;
			font-weight: bold;
			font-size: 14px;
		}

		.table-responsive {
			border: none;
		}

		table {
			margin-bottom: 0 !important;
		}

		.table thead tr {
			background: #0f172a;
			color: #ffffff;
		}

		.table thead th {
			border-bottom: none !important;
			font-size: 13px;
			text-transform: uppercase;
			letter-spacing: 0.4px;
			vertical-align: middle !important;
			white-space: nowrap;
		}

		.table tbody td {
			vertical-align: middle !important;
			font-size: 14px;
			border-top: 1px solid #e5e7eb !important;
		}

		.table tbody tr:hover {
			background: #f8fafc;
		}

		.currency-code {
			display: inline-block;
			background: #dbeafe;
			color: #1e40af;
			padding: 5px 9px;
			border-radius: 7px;
			font-weight: bold;
		}

		.rate {
			font-weight: bold;
			color: #111827;
			white-space: nowrap;
		}

		.footer-note {
			margin-top: 18px;
			font-size: 14px;
			color: #64748b;
			text-align: center;
		}

		@media (max-width: 900px) {
			.info-grid {
				grid-template-columns: 1fr;
			}

			.hero h1 {
				font-size: 28px;
			}

			.table-title {
				flex-direction: column;
				align-items: flex-start;
			}
		}

		@media (max-width: 600px) {
			.wrapper {
				width: 94%;
				padding: 20px 0;
			}

			.hero {
				padding: 24px;
				border-radius: 14px;
			}

			.hero h1 {
				font-size: 25px;
			}

			.hero p {
				font-size: 16px;
			}

			.info-card strong {
				font-size: 21px;
			}

			.table-panel {
				padding: 14px;
			}

			.table thead th,
			.table tbody td {
				font-size: 13px;
			}
		}
	</style>
</head>

<body>

	<div class="wrapper">

		<div class="hero">
			<h1>HNB tečajna lista u JSON formatu</h1>
			<p>
				Primjer dohvaćanja podataka s HNB API-ja, pretvaranja JSON odgovora u PHP polje
				i prikaza tečajne liste u HTML tablici.
			</p>
		</div>

		<div class="info-grid">
			<div class="info-card">
				<span>Broj tečajnice</span>
				<strong>' . $broj_tecajnice . '</strong>
			</div>

			<div class="info-card">
				<span>Datum primjene</span>
				<strong>' . $datum_primjene . '</strong>
			</div>

			<div class="info-card">
				<span>Broj valuta</span>
				<strong>' . $broj_valuta . '</strong>
			</div>
		</div>

		<div class="api-box">
			<p><strong>Izvor podataka:</strong> Hrvatska narodna banka - API tečajne liste</p>
			<a href="https://api.hnb.hr/tecajn-eur/v3" target="_blank">
				https://api.hnb.hr/tecajn-eur/v3
			</a>
		</div>

		<div class="table-panel">

			<div class="table-title">
				<h2>Tečajna lista</h2>
				<span class="badge-json">JSON → PHP → HTML</span>
			</div>

			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Broj tečajnice</th>
							<th>Datum</th>
							<th>Država</th>
							<th>Šifra</th>
							<th>Valuta</th>
							<th>Kupovni</th>
							<th>Srednji</th>
							<th>Prodajni</th>
						</tr>
					</thead>
					<tbody>';

					foreach ($json_data as $key => $value) { 
						
						print '
						<tr>
							<td>' . $json_data[$key]["broj_tecajnice"] . '</td>
							<td>' . $json_data[$key]["datum_primjene"] . '</td>
							<td>' . $json_data[$key]["drzava"] . '</td>
							<td><span class="currency-code">' . $json_data[$key]["Šifra valute"] . '</span></td>
							<td><strong>' . $json_data[$key]["valuta"] . '</strong></td>
							<td class="rate">' . $json_data[$key]["kupovni_tecaj"] . '</td>
							<td class="rate">' . $json_data[$key]["srednji_tecaj"] . '</td>
							<td class="rate">' . $json_data[$key]["prodajni_tecaj"] . '</td>
						</tr>';
					}

					print '
					</tbody>
				</table>
			</div>

		</div>

		<div class="footer-note">
			Podaci su dohvaćeni iz JSON odgovora i prikazani pomoću PHP-a.
		</div>

	</div>

</body>
</html>';
	
?>