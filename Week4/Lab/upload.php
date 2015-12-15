<?php namespace Lab4; include'./class/autoload.php' ;use finfo; use RuntimeException;
session_start();
try {
    
    if ( !isset($_FILES['upfile']['error']) || is_array($_FILES['upfile']['error']) ) {       
        throw new RuntimeException('Invalid parameters.');
    }

    switch ($_FILES['upfile']['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('No file sent.');
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('Exceeded filesize limit.');
        default:
            throw new RuntimeException('Unknown errors.');
    }
     
    if ($_FILES['upfile']['size'] > 200000000) {
        throw new RuntimeException('Exceeded filesize limit.');
    }

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $validExts = array(
                    'txt' => 'text/plain',
                    'html' => 'text/html',
                    'pdf' => 'application/pdf',
                    'doc' => 'application/msword',
                    'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    'xls' => 'application/vnd.ms-excel',
                    'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    'jpg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif'
                );    
    $ext = array_search( $finfo->file($_FILES['upfile']['tmp_name']), $validExts, true );
    
    
    if ( false === $ext ) {
        throw new RuntimeException('Invalid file format.');
    }
    
    $fileName =  sha1_file($_FILES['upfile']['tmp_name']); 
    $location = sprintf('./uploads/%s.%s', $fileName, $ext); 
    if(!is_dir('./uploads')){ mkdir ('./uploads');}
    if ( !move_uploaded_file( $_FILES['upfile']['tmp_name'], $location) ) {
        throw new RuntimeException('Failed to move uploaded file.');
    }
 
    $messages = new FlashMessage();
    $messages->removeAllMessages();
    $messages->addMessage('Success', 'File Uploaded Successfully');
    header('Location: ./upload-form.php');

} catch (RuntimeException $e) {

    $messages = new FlashMessage();
    $messages->removeAllMessages();
    $messages->addMessage('err', $e->getMessage());
    header('Location: ./upload-form.php');
}
?>
  </body>
</html>