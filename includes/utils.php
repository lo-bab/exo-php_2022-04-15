<?php

// fonction utilitaire pour debug
function vd($var, $die = false)
{
    return highlight_string("<?=\n" . var_export($var, true) . "\n ?>") . (($die === true) ? die('return') : '');
}

function sendAlert($type, $msg)
{
    $_SESSION['alerts'][$type][$msg] = $msg;
}

function showAlerts()
{
    $alerts = '';
    $alerts .= '<div class="container-fluid" id="hideMe">';

    if(isset($_SESSION['alerts']) && !empty($_SESSION['alerts']))
    {
        if (isset($_SESSION['alerts']['success']) && !empty($_SESSION['alerts']['success']))
        {
            foreach($_SESSION['alerts']['success'] as $value)
            {
                $alerts .= '<div class="alert alert-success" style="position: relative;"><li>' . $value . '</li></div>';
            }
        }
        
        if (isset($_SESSION['alerts']['danger']) && !empty($_SESSION['alerts']['danger']))
        {
            foreach($_SESSION['alerts']['danger'] as $value)
            {
                $alerts .= '<div class="alert alert-danger" style="position: relative;"><li>' . $value . '</li></div>';
            }
        }
        
        if (isset($_SESSION['alerts']['info']) && !empty($_SESSION['alerts']['info']))
        {
            foreach($_SESSION['alerts']['info'] as $value)
            {
                $alerts .= '<div class="alert alert-info" style="position: relative;"><li>' . $value . '</li></div>';
            }
        }
    }
        
    $alerts .= '</div>';

    return $alerts;
    
}

