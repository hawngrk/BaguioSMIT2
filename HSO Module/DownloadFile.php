<?php
require '../vendor/autoload.php';
use PhpOffice\PhpWord\Shared\ZipArchive;

$directory = 'reports';
$zipName = 'reports.zip';
$files = array_slice(scandir($directory), 2);
$zipFile = new ZipArchive();
if ($zipFile->open($zipName, ZipArchive::CREATE) === True) {
    foreach ($files as $file) {
        if (file_exists($directory. '/' .$file)) {
            $zipFile->addFile($directory. '/' .$file);
        }
    }
} else {
    echo "Download Failed!";
}

try {
    $zipFile->close();
    if (file_exists($zipName)) {
        $fh = fopen($zipName, 'r');

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($zipName) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($zipName));
        while (!feof($fh)) {
            echo fread($fh, 1024*8);
        }

        $files = array_slice(scandir($directory), 2);
        foreach ($files as $file) {
            if (file_exists($directory. '/' .$file)) {
                unlink($directory. '/' .$file);
            }
        }
        rmdir($directory);
        unlink($zipName);
    }
} catch (Exception $e) {
}