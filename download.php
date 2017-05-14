<?php
/**
 * Created by PhpStorm.
 * User: amesa
 * Date: 5/14/17
 * Time: 9:02 PM
 */

$name= $_GET['file'];

    header('Content-Description: File Transfer');
    header('Content-Type: application/force-download');
    header("Content-Disposition: attachment; filename=\"" . basename($name) . "\";");
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($name));
    ob_clean();
    flush();
    readfile("your_file_path/".$name); //showing the path to the server where the file is to be download
    exit;
?>