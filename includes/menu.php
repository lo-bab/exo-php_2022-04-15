<?php

function showMenuTsv() {

    // fichier contenant les datas
    $file_tsv = file(SITEPATH . '/datas/menu.tsv');

    // parcourt du fichier et formatage du tableau pour faciliter l'affichage
    foreach ($file_tsv as $key => $line) {

        $menu[$key] = explode("\t", trim($line));
    }

    // parcourt du fichier formaté et affichage
    foreach ($menu as $line) {

        if (count($line) === 1) {

            echo <<<HTML
                <h2><u>$line[0]</u></h2>
            HTML;
        } else {

            echo <<<HTML
                <div class="">
                    <h4>$line[0]<span style="float:right;">$line[2] €</span></h4>
                </div>
                    <p>$line[1]</p>
            HTML;
        }
    }
}

function showMenuCsv() {

    $file_tsv = file(SITEPATH . '/datas/menu.csv');

    foreach ($file_tsv as $key => $line) {

        $menu[$key] = str_getcsv(trim($line, "\t,"));
    }

    foreach ($menu as $line) {

        if (count($line) === 1) {

            echo <<<HTML
                <h2><u>$line[0]</u></h2>
            HTML;
        } else {

            echo <<<HTML
                <div class="">
                    <h4>$line[0]<span style="float:right;">$line[2] €</span></h4>
                </div>
                    <p>$line[1]</p>
            HTML;
        }
    }
}