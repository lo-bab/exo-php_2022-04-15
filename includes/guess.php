<?php

function buildGuessForm() {

    echo <<<HTML
        <form action="guess" method="POST">
            <div class="form-control">
                <input class="form-input" type="number" name="nbr" id="nbr" value="">
            <input class="btn btn-sm btn-primary" type="submit" value="Tester">
            </div>
        </form>
    HTML;

}

$nbr = 400;

if (isset($_POST['nbr'])) {

    if (($_POST['nbr'] === '')) {
        sendAlert('info', 'Saisissez un nombre !');
    } elseif ($_POST['nbr'] > $nbr) {
        sendAlert('danger', 'Le nombre est trog grand !');
    } elseif ($_POST['nbr'] < $nbr) {
        sendAlert('danger', 'Le nombre est trog petit !');
    } else {
        sendAlert('info', 'Bravo, vous avez trouvé !');
    }

}
