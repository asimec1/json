<?php
$json = '{
  "grad": "Zagreb",
  "temperatura": 22,
  "vrijeme": "sunčano"
}';

$podatci = json_decode($json, true);

echo "<h2>Vremenska prognoza</h2>";
echo "Grad: " . $podatci["grad"] . "<br>";
echo "Temperatura: " . $podatci["temperatura"] . " °C<br>";
echo "Vrijeme: " . $podatci["vrijeme"];
?>