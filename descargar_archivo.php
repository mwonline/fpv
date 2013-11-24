<?php
if (!isset($_GET['f']) || empty($_GET['f'])) {
    exit();
}
$root = "descargas/";
$file = basename($_GET['f']);
$path = $root . $file;

//evaluar el tipo de archivo por extension:

$trozos = explode('.', $file);
$extension = end($trozos);
switch ($extension) {
    case 'jpg': $type = ""; break;
    case 'png': $type = ""; break;
    case 'gif': $type = ""; break;
    case 'pdf': $type = "application/pdf"; break;
    case 'doc': $type = "application/vnd.ms-word"; break;
    case 'docx': $type = "application/vnd.ms-word"; break;
    case 'xls': $type = "application/vnd.ms-excel"; break;
    case 'xlsx': $type = "application/vnd.ms-excel"; break;
    case 'ppt': $type = "application/vnd.powerpoint"; break;
    case 'pptx': $type = "application/vnd.powerpoint"; break;
    case 'zip': $type = "application/zip"; break;
    default: $type = 'none';
}
//$type = 'application/pdf';
//$type="application/octet-stream";
if (is_file($path)) {
    $size = filesize($path);
    if (function_exists('mime_content_type')) {
        $type = mime_content_type($path);
    } else if (function_exists('finfo_file')) {
        $info = finfo_open(FILEINFO_MIME);
        $type = finfo_file($info, $path);
        finfo_close($info);
    }
    if ($type == '') {
        $type = "application/force-download";
    }
    // Definir headers
    header("Content-Type: $type");
    header("Content-Disposition: attachment; filename=$file");
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: " . $size);
    // Descargar archivo
    readfile($path);
} else {
    die("El archivo no existe.");
}
?>
