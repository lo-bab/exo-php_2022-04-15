<?php

function buildMenu($cssUlClass, $cssLiClass, $cssLinkClass) {

    $tabLinks = [ // '$link' => '$linkTitle'
        'home' => 'Accueil',
        'guess' => 'Devines',
        'glacier' => 'Le glacier',
        'contact' => 'Contact'
    ];
    
    echo <<<HTML
        <ul class="$cssUlClass">
    HTML;

    foreach ($tabLinks as $link => $linkTitle) {
        
        ($_SERVER['REQUEST_URI'] == SITEBASE . $link) ? $active = 'active text-info' : $active = '';

        echo <<<HTML
            <li class="$cssLiClass">
                <a class="$cssLinkClass $active" href="$link">$linkTitle</a>
            </li>
        HTML;
    }

    echo <<<HTML
        </ul>
    HTML;

}