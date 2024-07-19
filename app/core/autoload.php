<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 21/11/2022
 * Time: 12:11
 */

include_once ("config.php");
include_once ("database.php");
include_once ("Controller.php");
include_once ("model.php");
include_once ("app.php");
require_once('app/views/dompdf/autoload.view.php');
 spl_autoload_register(function ($class_name)
 {
     require_once('app/models/'.ucfirst($class_name).'.php');
 });