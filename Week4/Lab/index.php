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
                if (filter_input(INPUT_POST, 'action') == "Delete")
                {
                   if(Delete::delfile(filter_input(INPUT_POST, 'file')))
                   {
                       ?><p align="center" class="btn btn-primary" style="margin-left: 0%; padding-right: 48%; padding-left: 48%; text-align: center"> File Deleted </p> <?php
                   }
                   
                }
                elseif(filter_input (INPUT_POST, 'action')=="Upload")
                {
                    head('Location: upload-form.php');
                }
                else 
                {
                    
                }
            }
        
        ?>
        
        <p class="h1" style="text-align: center; font-weight: bold; letter-spacing: 10px"> File List </p>
        
        <form style = "display: inline;" action="#" method="POST"> 
                        <input type ="hidden" name="file" value="./uploads/<?php echo $file;?>">
                        <input class="btn btn-info" style="width: 35%; margin-left: 32%" type ="submit" name="action" value="Upload Files">
        </form>
        
        <table class="table table-striped table-hover well-lg"> 
            <tr><th><h3>File</h3></th><th><h3>Size</h3></th><th><h3>Type</h3></th><th><h3>Link</h3></th><th><h3>Preview</h3></th></tr>
            <?php        
                $filelist = array_diff(scandir('./uploads'), array(".","..",""));
                $info=  finfo_open(FILEINFO_MIME_TYPE);
                //Types Array for Preview 
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
                //Start Listing Files
                foreach($filelist as $file):
                //Format Type and Size Output
                $type = strtoupper(array_search(finfo_file($info, './uploads/'.$file),$FileTypes));
                $size = $util->formatBytes(filesize('./uploads/'.$file));
            ?>
                     
            <tr>
            <td>
            <?php
                //Output Filename
                echo $file;
            ?>
            </td>
            <td>
            <?php
                //Output Size of File
                echo $size;
            ?>
            </td>
            <td>
            <?php
                //Output Mime Type
                echo $type;
            ?>
            </td>
            <td>
                <div style="display: inline; width: 25%">
                    <!--Download Button-->
                    <a class = "btn btn-default" style="width: 50%" href="./uploads/<?php echo $file;?>">Download</a>
                    <!--Delete Action-->
                    <form style = "display: inline;" action="#" method="POST"> 
                        <input type ="hidden" name="file" value="./uploads/<?php echo $file;?>">
                        <input class="btn btn-danger" style="width: 35%" type ="submit" name="action" value="Delete">
                    </form>
                </div>
            </td>
            <td>
            <?php
                 
                //Switch Displays file if Image or sets preview window to type icon.
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
