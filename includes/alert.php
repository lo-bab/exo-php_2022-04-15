<?php

namespace kernel;

class Alert
{
    public $alerts;
    public $alerts_confirm;
    
    public function __construct()
    {
        
    }

    protected function sendAlert($type, $msg)
    {
        $_SESSION['alerts'][$type][$msg] = $msg;
    }

    protected function showAlerts()
    {
        $this->alerts .= '<div class="container-fluid" id="hideMe">';

        if(isset($_SESSION['alerts']) && !empty($_SESSION['alerts']))
        {
            if (isset($_SESSION['alerts']['success']) && !empty($_SESSION['alerts']['success']))
            {
                foreach($_SESSION['alerts']['success'] as $value)
                {
                    $this->alerts .= '<div class="alert alert-success" style="position: relative;"><li>' . $value . '</li></div>';
                }
            }
            
            if (isset($_SESSION['alerts']['danger']) && !empty($_SESSION['alerts']['danger']))
            {
                foreach($_SESSION['alerts']['danger'] as $value)
                {
                    $this->alerts .= '<div class="alert alert-danger" style="position: relative;"><li>' . $value . '</li></div>';
                }
            }
            
            if (isset($_SESSION['alerts']['info']) && !empty($_SESSION['alerts']['info']))
            {
                foreach($_SESSION['alerts']['info'] as $value)
                {
                    $this->alerts .= '<div class="alert alert-info" style="position: relative;"><li>' . $value . '</li></div>';
                }
            }
        }
            
        $this->alerts .= '</div>';

        return $this->alerts;
        
    }

    protected function sendAlertConfirm($type, $msg)
    {
        $_SESSION['alerts_confirm'][$type][$msg] = $msg;
    }

    protected function showAlertsConfirm()
    {
        $this->alerts_confirm .= '<div class="container-fluid">';

        if(isset($_SESSION['alerts_confirm']) && !empty($_SESSION['alerts_confirm']))
        {
            if (isset($_SESSION['alerts_confirm']['success']) && !empty($_SESSION['alerts_confirm']['success']))
            {
                foreach($_SESSION['alerts_confirm']['success'] as $value)
                {
                    $this->alerts_confirm .= '<div class="alert alert-success" style="position: relative;"><li>' . $value . '</li></div>';
                }
            }
            
            if (isset($_SESSION['alerts_confirm']['danger']) && !empty($_SESSION['alerts_confirm']['danger']))
            {
                foreach($_SESSION['alerts_confirm']['danger'] as $value)
                {
                    $this->alerts_confirm .= '<div class="alert alert-danger" style="position: relative;">
                        <li>' . $value . '</li>
                        <form>
                            <input type="button" class="btn btn-info" data-bs-dismiss="alert" aria-label="Close" value="Annuler">
                            <button type="submit" class="btn btn-danger" href="../article/deleteConfirm" value="Submit">Confirmer</button>
                        </form>
                        </div>';
                }
            }
            
            if (isset($_SESSION['alerts_confirm']['info']) && !empty($_SESSION['alerts_confirm']['info']))
            {
                foreach($_SESSION['alerts_confirm']['info'] as $value)
                {
                    $this->alerts_confirm .= '<div class="alert alert-info" style="position: relative;"><li>' . $value . '</li></div>';
                }
            }
        }
        
        $this->alerts_confirm .= '</div>';

        return $this->alerts_confirm;
        
    }

}
