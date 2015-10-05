<?php

/**
 * Created by PhpStorm.
 * User: Raphson
 * Date: 9/25/15
 * Time: 21:21
 */
function getStatus($projectStatus)
{
    $projectStates = ["Upcoming" => "Upcoming", "Active" => "Active", "Completed" => "Completed"];

    if( array_key_exists($projectStatus, $projectStates) ) {
        unset($projectStates[$projectStatus]);
        foreach( $projectStates as $key => $value) {
            echo "<option value='{$value}'>{$value}</option>";
        }
    }

}