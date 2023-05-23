<?php
if(isset($_REQUEST["image"])){
    // Get parameters
    $image = urldecode($_REQUEST["image"]); // Decode URL-encoded string

    /* Test whether the file name contains illegal characters
    such as "../" using the regular expression */
    if(preg_match('/^[^.][-a-z0-9_.]+[a-z]$/i', $image)){
        $imagePath = "uploads/" . $image;

        // Process download
        if(file_exists($imagePath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($imagePath).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($imagePath));
            flush(); // Flush system output buffer
            readfile($imagePath);
            die();
        } else {
            http_response_code(404);
	        die();
        }
    } else {
        die("Invalid image name!");
    }
}
?>