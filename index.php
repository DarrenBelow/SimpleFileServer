<?php
include('phpqrcode/qrlib.php');

function getServerIp() {
    $ip = '127.0.0.1';
    if (function_exists('shell_exec')) {
        $output = shell_exec('ipconfig');
        if (preg_match('/IPv4 Address[^:]*: ([\d\.]+)/', $output, $match)) {
            $ip = $match[1];
        }
    }
    return $ip;
}

function listFiles($dir) {
    $items = scandir($dir);
    $folders = [];
    $files = [];
    foreach ($items as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }
        $itemPath = $dir . '/' . $item;
        if (is_dir($itemPath)) {
            $folders[] = $item;
        } else {
            $files[] = $item;
        }
    }
    return ['folders' => $folders, 'files' => $files];
}

$directory = isset($_GET['dir']) ? urldecode($_GET['dir']) : 'files';

$ip = getServerIp();
$port = 8000; // Change this if you run the server on a different port
$url = "http://$ip:$port";

QRcode::png($url, 'qrcode.png');

?>
<!DOCTYPE html>
<html>
<head>
    <title>File Browser</title>
    <style>
        body {
            display: flex;
            font-family: Arial, sans-serif;
        }
        .file-list {
            flex: 1;
            padding: 20px;
        }
        .qr-code {
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .qr-code img {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="file-list">
        <h1>File Browser</h1>
        <h2>Files and Folders in <?php echo $directory; ?>:</h2>
        <ul>
            <?php
            $items = listFiles($directory);

            foreach ($items['folders'] as $folder) {
                $folderPath = $directory . '/' . $folder;
                $encodedPath = urlencode($folderPath);
                echo "<li>Folder: <a href=\"?dir=$encodedPath\">$folder</a></li>";
            }

            foreach ($items['files'] as $file) {
                $filePath = $directory . '/' . $file;
                $encodedPath = urlencode($filePath);
                echo "<li>File: <a href=\"$filePath\" target=\"_blank\">$file</a></li>";
            }
            ?>
        </ul>
    </div>
    <div class="qr-code">
        <h2>Access this page on your phone by scanning the QR code:</h2>
        <img src="qrcode.png" alt="QR Code">
    </div>
</body>
</html>
