# France cities seeds

This package extracts the tree structure of French metropolitan regions, departments and cities from the CSV file provided by [www.data.gouv.fr](http://www.data.gouv.fr/fr/datasets/decoupage-administratif-communal-francais-issu-d-openstreetmap/).

## Usage

Place the extracted CSV file (available at this address : [www.data.gouv.fr/fr/datasets/decoupage-administratif-communal-francais-issu-d-openstreetmap/](http://www.data.gouv.fr/fr/datasets/decoupage-administratif-communal-francais-issu-d-openstreetmap/)) in the folder you need, and use the `extractFromFile($filepath)` function to extract data :

```php
$regions = Kblais\FranceCitiesSeeds\extractFromFile('/path/to/csv/file.csv');
```

## Output extract

```php
[
    11 => [
        "name" => "ILE-DE-FRANCE",
        "code" => "11",
        "departments" => [
            78 => [
                "name" => "YVELINES",
                "code" => "78",
                "cities" => [
                    78165 => [
                        "insee_code" => "78165",
                        "name" => "Les Clayes-sous-Bois",
                        "surface" => "6111331.000000000000000",
                        "lat" => "1.983682382432120",
                        "lon" => "48.818793614296297",
                        "status" => "Commune simple",
                        "population" => "17.5",
                        "canton_code" => "38",
                        "district_code" => "4",
                    ],
                    78674 => [
                        "insee_code" => "78674",
                        "name" => "Villepreux",
                        "surface" => "10446819.000000000000000",
                        "lat" => "2.012416565085020",
                        "lon" => "48.831123160333597",
                        "status" => "Commune simple",
                        "population" => "9.9",
                        "canton_code" => "22",
                        "district_code" => "3",
                    ],
                    ...
                ],
            ],
            ...
        ],
    ],
    ...
]
```
