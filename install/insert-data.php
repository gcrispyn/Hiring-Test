<?php
    require __DIR__ . '/../src/website/app.php';
    $dir   = __DIR__ . '/../data/';
    $files = scandir($dir);
    $fileNameRegExp = '/[0-9]+_(.*)/';
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            preg_match_all($fileNameRegExp, basename($file, '.json'), $tableName);
            $tableName = $tableName[1][0];
            $tableData  = json_decode(file_get_contents($dir . $file), true);
            
            foreach ($tableData as $data) {
                $app[$tableName]->add($data);
            }
        }
    }
    
    