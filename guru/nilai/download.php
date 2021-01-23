<?php
$file = $_GET['file'];
if (file_exists($file)) {
    // File exist, download
    //Define header information
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
    header('Content-Length: ' . filesize($file));
    header('Pragma: public');

    //Clear system output buffer
    flush();

    //Read the size of the file
    readfile($file, true);
    // hapus file setelah didownload
    unlink($file);
}
