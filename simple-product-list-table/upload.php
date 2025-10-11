<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
        <input type="file" name="myfile" id="myfile">
        <button>Upload</button>
    </form>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $('form').submit(function(e){
                console.log('ljkljl');
                e.preventDefault();
                let file = document.querySelector('#myfile').files[0];

                let data = new FormData();
                //data.append( 'x', 'lj' );
                data.append( 'my_file', file )

                $.ajax({
                    type  : 'GET',
                    url     : 'do_upload.php',
                    data    : data,
                    cache           : false,
                    processData     : false,
                    contentType     : false
                });
            });
        });
    </script>
</body>
</html>