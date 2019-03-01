<!Doctype html>
  <head>
    <title>Uploading...</title>
    <style>
      img
      {
        height: auto;
        width: 400px;
      }
    </style>
  </head>

  <body>
  <h1>Uploading File...</h1>

<?php

  require ("checkvalid.php");
    $document_root = $_SERVER['DOCUMENT_ROOT'];
    if ($_FILES['the_file']['error'] > 0)
      {
        echo 'Problem ';
        switch ($_FILES['the_file']['error'])
        {
          case 1:
            echo 'File exceeded upload_max_file_size.';
            break;
          case 2:
            echo 'File exeeded max_file_size.';
            break;
          case 3:
            echo 'File only partially uploaded.';
            break;
          case 4:
            echo 'No file uploaded.';
            break;
          case 6:
            echo 'Cannot upload file: No temp directory specified.';
            break;
          case 7:
            echo 'Upload failed: Cannot write to disk.';
            break;
          case 8:
            echo 'A PHP extension blocked the file upload.';
            break;
        }
        exit;
      }

      // Does the file have the right MIME type?
      if ($_FILES['the_file']['type'] != 'image/jpeg')
      {
        echo 'Problem: file is not a JPG image.';
        exit;
      }

      //put the file where we'd like it
      $uploaded_file = "$document_root/assignments/PHPAssignment/images/".$_FILES['the_file']['name'];
      if (is_uploaded_file($_FILES['the_file']['tmp_name']))
        {
        if (!move_uploaded_file($_FILES['the_file']['tmp_name'], $uploaded_file))
          {
            echo 'Problem: Could not move file to destination directory.';
            exit;
          }
        }
      else
        {
            echo 'Problem: Possible file upload attack. Filename: ';
            echo $_FILES['the_file']['name'];
            exit;
        }
        echo 'File uploaded successfully.';

        // show what was $uploaded_file
        echo '<p>You uploaded the following image:<br/>';
        echo '<img src="./images/'.$_FILES['the_file']['name'].'"/>';
        echo '<br/><form action="home.php" method="get"><input type="submit" value="Back to Homepage"/></form>'
?>
 </body>
</html>
