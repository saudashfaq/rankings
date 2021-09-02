<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CamiagnsImportController extends Controller
{
    //
               public function csvToArray()
                {
                    if(($handle = fopen(asset('locations_serp_2021_08_18.csv'), 'r')) !== FALSE) {
                        while (($data = fgetcsv($handle, 1000, ',', '"')) !== FALSE) {
                            echo '<pre>';
                            print_r($data);
                            echo '</pre>';
                        }
                        fclose($handle);
                    }
                }

//    public function DownloadFile($filetype, $Array_data, $content)
//    {
//
//        $LevelArray = array('Date', 'Name', 'Level');
//
//        $selected_array = $LevelArray;
//        if ($filetype == 'csv') {
//
//            $Filename = 'locations_serp_2021_08_18.csv';
//            header('Content-Type: text/csv; charset=utf-8');
//            header('Content-Disposition: attachment;
//            filename=' . $Filename . '');
//            // creat    e a file pointer connected to the output stream
//            $output = fopen('php://output', 'w');
//            fputcsv($output, $selected_array);
//            foreach ($Array_data as $row) {
//                fputcsv($output, $row);
//            }
//            fclose($output);
//        }
//    }
}
