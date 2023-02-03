<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $myfile = fopen("vote_response.txt", "w") or die("Unable to open file!");
    fwrite($myfile, $_POST);
    fclose($myfile);
}