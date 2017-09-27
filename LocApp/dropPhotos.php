

<html>

<head>

    <link href="dropzone.css" type="text/css" rel="stylesheet" />

    <!-- 1 -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script src="dropzone.js"></script>

    <script>
        <!-- 3 -->
        Dropzone.options.myDropzone = {
            thumbnailWidth: 250,
            thumbnailHeight: 250,
            previewElement:'preview',
             addRemoveLinks: true,
            removedfile: function(file) {
                var name = file.name;
                $.ajax({
                    type: 'POST',
                    url: 'delete.php',
                    data: "filename="+name,
                    dataType: 'html'
                });
                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            }
        };
    </script>

</head>
<style>

    .container{
        width: 700px;
        margin:30px auto;
    }
    .dropzone .dz-preview .dz-image{
        border :3px dashed lightcoral;
        font-weight:500;
        width: 250px;
        height: 250px;
        position: relative;
    }

</style>
<body>
<div>
    <h1>PHOTOS ANNONCE</h1>

</div>
<div class="container">

<form action="upload.php" class="dropzone " id="my-dropzone"></form>

</div>
<div>

    <button onclick="nonPhotos()">continuer </button>

</div>

<script>
    function nonPhotos() {

        window.location.href ="response.php"

    }

</script>
</body>

</html>