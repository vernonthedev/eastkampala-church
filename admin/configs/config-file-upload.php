<?php
include '../config.php';

//CHECK IF FILE WAS UPLOADED
if (isset($_POST['submit'])) {
//configure the file locations
$targetDir = "uploads/files/";
$targetFile = $targetDir . basename($_FILES["pdfFile"]["name"]);
$fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// check if the file is a pdf and less than 2MB
if($fileType != "pdf" || $_FILES["pdfFile"]["size"] > 2000000){
    echo '<script> alert("Only PDF Files less than 2MB are allowed to be uploaded.")</script>';
}else{
    //move the uploaded file to the uploads folder
    if(move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $targetFile)){
        //insert the file into the database then
        $filename = $_FILES["pdfFile"]["name"];
        $folder_path = $targetDir;
        $time_stamp = date('Y-m-d H:i:s');
        $sql = "INSERT INTO uploaded_files(filename, folder_path, time_stamp) VALUES (?, ?, ?)";
        $results = $conn->prepare($sql);
        $results->execute([$filename,$folder_path,$time_stamp]);

        if($results===TRUE){
            echo '<script>alert("File Uploaded Successfully")</script>';
        }else{
            echo '<script>alert("Error occurred.. ")</script>';
        }
    }else{
        echo '<script>alert("Error Uploading file")</script>';
    }
}

}

?>
