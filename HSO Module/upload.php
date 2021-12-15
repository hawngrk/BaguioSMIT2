<?php 
require('../includes/configure.php');

?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <form enctype="multipart/form-data">
            <input type="file" name="image" id="infoImage">    
            <input type="button" name="submit" value="Upload" id="updBtn">
        </form>
        
        <div>
            <?php 
            include('getImages.php');
            ?>
        </div>

        <script>
            $('#updBtn').click(async function(e) {
                var files = document.getElementById("infoImage").files;
                var formData = new FormData();
                formData.append('file', files[0]);
                $.ajax({
                    url: 'UploadImage.php',
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (result) {
                        console.log(result);
                        // Swal.fire({
                        //     icon: 'sucess',
                        //     title: 'Upload Image',
                        //     showDenyButton: true,
                        //     confirmButtonText: 'Yes',
                        //     denyButtonText: `No`,
                        //     confirmButtonColor: '#28a745',
                        //     denyButtonColor: '#dc3545',
                        // });
                    }
                });
            });

        </script>
    </body>
</html>