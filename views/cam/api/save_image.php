<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include($_SERVER['DOCUMENT_ROOT'].'/hims/controller/select.php');

include($_SERVER['DOCUMENT_ROOT'].'/hims/controller/insert.php');

$obj = new INSERT;

$folder = "/hims/images/uploads/photo/patients_pic/";//"/klinika/upload/photo/patients_pic/";
$destinationFolder = $_SERVER['DOCUMENT_ROOT'] . $folder; // you may need to adjust to your server configuration
$maxFileSize = 2 * 1024 * 1024;

// Get the posted data
$postdata = file_get_contents("php://input");

if (!isset($postdata) || empty($postdata))
    exit(json_encode(["success" => false, "reason" => "Not a post data"]));

// Extract the data
$request = json_decode($postdata);

// Validate
if (trim($request->data) === "")
    exit(json_encode(["success" => false, "reason" => "Not a post data"]));


$file = $request->data;

// getimagesize is used to get the file extension
// Only png / jpg mime types are allowed
$size = getimagesize($file);
$ext = $size['mime'];
if ($ext == 'image/jpeg')
    $ext = '.jpg';
elseif ($ext == 'image/png')
    $ext = '.png';
else
    exit(json_encode(['success' => false, 'reason' => 'only png and jpg mime types are allowed']));

// Prevent the upload of large files
if (strlen(base64_decode($file)) > $maxFileSize)
    exit(json_encode(['success' => false, 'reason' => "file size exceeds {$maxFileSize} Mb"]));

// Remove inline tags and spaces
$img = str_replace('data:image/png;base64,', '', $file);
$img = str_replace('data:image/jpeg;base64,', '', $img);
$img = str_replace(' ', '+', $img);

// Read base64 encoded string as an image
$img = base64_decode($img);

// Give the image a unique name. Don't forget the extension
$filename = $_GET['prn'] . "-" . time() . $ext;

// The path to the newly created file inside the upload folder
$destinationPath = "$destinationFolder$filename";

// Create the file or return false
$success = file_put_contents($destinationPath, $img);

if (!$success)
    exit(json_encode(['success' => false, 'reason' => 'the server failed in creating the image']));
	echo $_SERVER['DOCUMENT_ROOT'];
// Inform the browser about the path to the newly created image
$obj->update_pic($_GET['prn'],$filename);
exit(json_encode(['success' => true, 'path' => "$folder$filename"]));