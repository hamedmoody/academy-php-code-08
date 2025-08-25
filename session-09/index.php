<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload file</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="myfile">
            My File
        </label>
        <input type="file" id="myfile" name="my_file" accept="image/*">
        <button name="upload_file">Upload</button>
    </form>
</body>
</html>