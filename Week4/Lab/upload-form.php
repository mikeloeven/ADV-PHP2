<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./CSS/bootstrap.css">
        <link rel="stylesheet" href="./CSS/bootstrap.min.css">
        <title></title>
    </head>
    <body>
        <!-- The data encoding type, enctype, MUST be specified as below -->
        <?
        <form class="well form-control" enctype="multipart/form-data" action="./Class/upload.php" method="POST">
            <!-- MAX_FILE_SIZE must precede the file input field -->
            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->
            <!-- Name of input element determines name in $_FILES array -->
            Send this file: <input class="btn btn-primary" name="upfile" type="file" />
            <input class="btn btn-info" type="submit" value="Send File" />
        </form>

        <!-- display imaged
        <img src="uploads/30420d1a9afb2bcb60335812569af4435a59ce17.jpg" /> -->
    </body>
</html>