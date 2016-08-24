<?php

namespace Kblais\FranceCitiesSeeds;

/**
 * Function listing ignored department codes
 *
 * @return  Array
 */
if (!function_exists(__NAMESPACE__ . '\getIgnoredDepartments')) {
    function getIgnoredDepartments()
    {
        return [97, ''];
    }
}

/**
 * Extract regions, departments and cities from the given CSV file
 *
 * @param  String  $filepath  Path to the CSV file
 * @param  Boolean  $ignore_first_line  Ignore the first line (CSV header)
 * @return  Array
 */
if (!function_exists(__NAMESPACE__ . '\extractFromFile')) {
    function extractFromFile($filepath, $ignore_first_line = true)
    {
        $handle = fopen($filepath, 'r');

        $regions = [];

        if ($ignore_first_line) {
            fgetcsv($handle);
        }

        while (($data = fgetcsv($handle, null, ",")) !== false) {
            $department_code = $data[13];

            if (in_array($department_code, getIgnoredDepartments())) {
                continue;
            }

            $city_code = $data[0];
            $region_code = $data[15];

            if (!array_key_exists($region_code, $regions)) {
                $regions[$region_code] = [
                    'name' => $data[16],
                    'code' => $region_code,
                    'departments' => [],
                ];
            }

            if (!array_key_exists($department_code, $regions[$region_code]['departments'])) {
                $regions[$region_code]['departments'][$department_code] = [
                    'name' => $data[14],
                    'code' => $department_code,
                    'cities' => [],
                ];
            }

            $regions[$region_code]['departments'][$department_code]['cities'][$city_code] = [
                'insee_code' => $city_code,
                'name' => $data[1],
                'surface' => $data[3],
                'lat' => $data[4],
                'lon' => $data[5],
                'status' => $data[6],
                'population' => $data[10],
                'canton_code' => $data[11],
                'district_code' => $data[12],
            ];
        }

        fclose($handle);

        return $regions;
    }
}
