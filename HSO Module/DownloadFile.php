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

if ($zipFile->close()) {
    if (file_exists($zipName)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($zipName) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($zipName));
        readfile($zipName);
        unlink($zipName);

        $files = array_slice(scandir($directory), 2);
        foreach ($files as $file) {
            if (file_exists($directory. '/' .$file)) {
                unlink($directory. '/' .$file);
            }
        }
        rmdir($directory);
    }
} else {
    echo "Download Failed!";
}