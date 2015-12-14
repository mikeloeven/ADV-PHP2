<?php namespace Lab4; include './Class/autoload.php'; use finfo_file;?>
<!DOCTYPE html>


<html>
    <head>
       
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="./CSS/bootstrap.css">
        <link rel="stylesheet" href="./CSS/bootstrap.min.css">
    
    </head>
    <body>
       
        
            <?php
            
            $util = new util();
            
            if ($util->isPostRequest())
            {
                if (filter_input(INPUT_POST, 'Action') == "Delete")
                {
                    
                }
                else if (filter_input(INPUT_POST, 'Action') == "Upload")
                {
                    
                }
                else 
                {
                    
                }
            }
        
        ?>
        
        <p class="h1" style="text-align: center; font-weight: bold; letter-spacing: 10px"> File List </p>
        
        
        
        <table class="table table-striped table-hover well-lg"> 
            <tr><th><h3>File</h3></th><th><h3>Size</h3></th><th><h3>Type</h3></th><th><h3>Link</h3></th><th><h3>Preview</h3></th></tr>
            <?php        
                $filelist = array_diff(scandir('./uploads'), array(".","..",""));
                $info=  finfo_open(FILEINFO_MIME_TYPE);
                $FileTypes = array
                (
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
                foreach($filelist as $file):
            
                $type = strtoupper(array_search(finfo_file($info, './uploads/'.$file),$FileTypes));
                $size = $util->formatBytes(filesize('./uploads/'.$file));
            ?>
                     
            <tr>
            <td>
            <?php 
                echo $file;
            ?>
            </td>
            <td>
            <?php
                echo $size;
            ?>
            </td>
            <td>
            <?php
                echo $type;
            ?>
            </td>
            <td>
                <div style="display: inline; width: 25%">
                    <a class = "btn btn-default" style="width: 50%" href="./uploads/<?php echo $file;?>">Download</a>
                    <form style = "display: inline;" action="#" method="POST"> 
                        <input type ="hidden" name="delfile" value="./uploads/<?php echo $file;?>">
                        <input class="btn btn-danger" style="width: 25%" type ="action" value="Delete">
                    </form>
                </div>
            </td>
            <td>
            <?php
                                
                switch($type)
                {  
                    case "JPG";
                    ?><img src ="./uploads/<?php echo $file; ?>" height = 250px width = 250px><?php
                    break;
                                 
                    case "PNG";
                    ?><img src ="./uploads/<?php echo $file; ?>" height = 250px width = 250px><?php
                    break;
                             
                    case "GIF";
                    ?><img src ="./uploads/<?php echo $file; ?>" height = 250px width = 250px><?php
                    break;
                                    
                    case "DOC":
                    ?><img src ="./icons/wordIcon.png" height = 250px width = 250px><?php
                    break;
                                    
                    case "DOCX":
                    ?><img src ="./icons/wordIcon.png" height = 250px width = 250px><?php
                    break;
                                    
                    case "XLS":
                    ?><img src ="./icons/ExcelIcon.png" height = 250px width = 250px><?php
                    break;
                                    
                    case "XLSX":
                    ?><img src ="./icons/ExcelIcon.png" height = 250px width = 250px><?php
                    break;
                                    
                    case "PDF":
                    ?><img src ="./icons/PDFIcon.png" height = 250px width = 250px><?php
                    break;
                                    
                    case "TXT":
                    ?><img src ="./icons/TxtIcon.png" height = 250px width = 250px><?php
                    break;
                                    
                    default:
                    ?><img src ="./icons/FileUnknown.png" height = 250px width = 250px><?php
                    break;
                                 
                }
            ?>
                            
            </td>
            </tr>
                    
            <?php 
                endforeach; 
            ?>
                
           
            
        </table>
    </body>
</html>
