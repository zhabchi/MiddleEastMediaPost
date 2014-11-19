<?php
$target_dir = "web/pdfs/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "pdf"  ) {
    echo "Sorry, only pdf files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		$reportName = $_POST["reportname"];
		$entry = $reportName.";". basename( $_FILES["fileToUpload"]["name"])."\n";
		file_put_contents("web/reports.txt", $entry, FILE_APPEND);
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		header("Location:main.html");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>