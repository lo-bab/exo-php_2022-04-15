<?php

$parfums = [
    "fraise" => 4,
    "chocolat" => 5,
    "vanille" => 3
];

$contenants = [
    "pot" => 2,
    "cornet" => 3
];

$supps = [
    "pepites" => 1,
    "chantilly" => 0.5
];

function buildIceForm(array $parfums, array $contenants, array $supps) {

    echo <<<HTML
        <form action="glacier" method="POST">
            <h2>Parfums</h2>
    HTML;

    foreach ($parfums as $parfum => $tarif) {

        $attribut = '';

        if (isset($_POST['parfum'])) {

            foreach ($_POST['parfum'] as $key => $value) {

                if ($_POST['parfum'][$key] === $parfum) {

                   $attribut = 'checked';
                   
                }
            }

        }
    
        echo <<<HTML
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="parfum[]" id="$parfum" value="$parfum" $attribut>
                <label class="form-check-label" for="$parfum">$parfum - $tarif €</label>
            </div>
        HTML;
    
    }

    echo <<<HTML
            <h2>Contenant</h2>
    HTML;

    foreach ($contenants as $contenant => $tarif) {

        $attribut = '';

        if (isset($_POST['contenant'])) {

            if ($_POST['contenant'] === $contenant) {

                $attribut = 'checked';

            }

        }

        echo <<<HTML
            <div class="form-check">
                <input class="form-check-input" type="radio" name="contenant" id="$contenant" value="$contenant" $attribut>
                <label class="form-check-label" for="$contenant">$contenant - $tarif €</label>
            </div>
        HTML;
    
    }

    echo <<<HTML
            <h2>Suppléments</h2>
    HTML;

    foreach ($supps as $supp => $tarif) {

        $attribut = '';

        if (isset($_POST['supp'])) {

            foreach ($_POST['supp'] as $key => $value) {
                if ($_POST['supp'][$key] === $supp) {

                   $attribut = 'checked';
                   
                }
            }

        }

        echo <<<HTML
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="supp[]" id="$supp" value="$supp" $attribut>
                <label class="form-check-label" for="$supp">$supp - $tarif €</label>
            </div>
        HTML;

    }

    echo <<<HTML
        <input class="btn btn-sm btn-primary" type="submit" value="Composer">
        </form>
    HTML;

}

function composeGlace(array $parfums, array $contenants, array $supps) {

    $compos = [];
    $total = 0;

    if (isset($_POST['parfum'])) {

        foreach ($_POST['parfum'] as $parfum) {

            if (isset($parfums[$parfum])) {

               $compos[] = $parfum;
               $total += $parfums[$parfum];
            }
        }
    }

    if (isset($_POST['contenant'])) {

        if (isset($contenants[$_POST['contenant']])) {

            $compos[] = $_POST['contenant'];
            $total += $contenants[$_POST['contenant']];
        }
    }

    if (isset($_POST['supp'])) {

        foreach ($_POST['supp'] as $supp) {

            if (isset($supps[$supp])) {

               $compos[] = $supp;
               $total += $supps[$supp];
            }
        }
    }

    echo <<<HTML
        <ul class="">
    HTML;

    foreach ($compos as $compo) {

        echo <<<HTML
            <li class="">$compo</li>
        HTML;
    }

    echo <<<HTML
        </ul>
        <div>
            <span><u>Montant à payer</u> &nbsp; </span> : &nbsp;
            <strong> $total <span> €</span> </strong></div>
    HTML;

}