<!DOCTYPE html>
<html>
  <head>
    <title>Upload Image</title>
  </head>
  <body>
    <form action="" method="post" enctype="multipart/form-data">
      <label for="password">Enter Password:</label>
      <input type="password" id="password" name="password">
      <br>
      <label for="file">Select Image:</label>
      <input type="file" id="file" name="file">
      <br><br>
      <input type="submit" value="Upload Image">
    </form>
    <?php
    $password = "password"; //set your password here
    if(isset($_POST["password"]) && $_POST["password"] == $password) {
        if(isset($_FILES["file"])) {
            $file = $_FILES["file"];
            $file_name = $file["name"];
            $file_tmp = $file["tmp_name"];
            $file_size = $file["size"];
            $file_error = $file["error"];
            $file_ext = explode('.', $file_name);
            $file_ext = strtolower(end($file_ext));
            $allowed = array("jpg", "jpeg", "png");
            if(in_array($file_ext, $allowed)) {
                if($file_error === 0) {
                    if($file_size <= 209715200) {
                        $file_name_new = "malo.png";
                        $file_destination = 'C:\Users\tajny\OneDrive\Plocha\WAP-Hotel\0.3\\' . $file_name_new; // set your destination folder here
                        if(move_uploaded_file($file_tmp, $file_destination)) {
                          echo "Image Uploaded Successfully.";
                        } else {
                            echo "Error uploading file.";
                        }
                    } else {
                        echo "File size too large.";
                    }
                } else {
                    echo "Error uploading file.";
                }
            } else {
                echo "Invalid file type.";
            }
        }
    } else {
        echo "Incorrect Password.";
    }
    ?>
  </body>
</html>