import json

json_podaci = '''
{
  "ime": "Petar",
  "prezime": "Kovač",
  "starost": 30,
  "grad": "Zagreb",
  "zaposlen": true,
  "auti": [
    {
      "marka": "Ford",
      "model": "Mustang",
      "godina": 2018,
      "registriran": true
    },
    {
      "marka": "BMW",
      "model": "X1",
      "godina": 2020,
      "registriran": true
    },
    {
      "marka": "Fiat",
      "model": "500",
      "godina": 2015,
      "registriran": false
    }
  ]
}
'''

podatci = json.loads(json_podaci)

print("Podaci o osobi")
print("Ime i prezime:", podatci["ime"], podatci["prezime"])
print("Starost:", podatci["starost"])
print("Grad:", podatci["grad"])

if podatci["zaposlen"] == True:
    print("Status: zaposlen")
else:
    print("Status: nije zaposlen")

print()
print("Popis automobila")

for auto in podatci["auti"]:
    print("-------------------------")
    print("Marka:", auto["marka"])
    print("Model:", auto["model"])
    print("Godina:", auto["godina"])

    if auto["registriran"] == True:
        print("Registriran: Da")
    else:
        print("Registriran: Ne")