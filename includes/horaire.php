<?php

function afficherHoraires() {

    $tabHoraires = [
        "Lundi" => ["8:00", "12:00", "14:00", "16:00"], 
        "Mardi" => ["8:00", "12:00", "14:00", "16:00"], 
        "Mercredi" => ["8:00", "12:00", "14:00", "16:00"], 
        "Jeudi" => ["8:00", "12:00", "14:00", "16:00"], 
        "Vendredi" => ["8:00", "12:00", "14:00", "16:00"], 
        "Samedi" => ["8:00", "12:00", "0:00", "0:00"], 
        "Dimanche" => ["0:00", "0:00", "0:00", "0:00"]
    ];
    
    foreach ($tabHoraires as $jour => $heures) {
        
        if ($heures[0] === "0:00" && $heures[1] === "0:00" && $heures[2] === "0:00" && $heures[3] === "0:00") {

            $horaires_journee = "fermé toute la journée";

        } elseif ($heures[2] === "0:00" && $heures[3] === "0:00") {

            $horaires_journee = "de {$heures[0]}h à {$heures[1]}h et fermé l'après-midi";

        } else {

            $horaires_journee = "de {$heures[0]}h à {$heures[1]}h et de {$heures[2]}h à {$heures[3]}h";
        }

        (showJourFr() == $jour) ? $className = "text-success" : $className = "text-danger";

        echo '<div class="' . $className . '">' . $jour . ' : ' . $horaires_journee . '</div><br>';
    }

    $time_now = new DateTime(date('H:i'));
    $time0 = new DateTime($heures[0]);
    $time1 = new DateTime($heures[1]);
    $time2 = new DateTime($heures[2]);
    $time3 = new DateTime($heures[3]);

    if (($time_now > $time0 && $time_now < $time1) || ($time_now > $time2 && $time_now < $time3)) {
        afficherAlerte("success", "nous sommes actuellement ouvert");
    } else {
        afficherAlerte("danger", "nous sommes actuellement fermé");
    }
}

function afficherAlerte($style, $msg) {
    echo '<div class="alert alert-' . $style . '">' . $msg . '</div>';
}

function showJourFr() {

    $jours= array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");

    return $jours[date("w")];
}