<!DOCTYPE>
<html>
    <head>
        <title>Upload Large File</title>
    </head>
    <body>
        <form action="/uploade-data" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="csv_file">
            <button type="submit">Upload</button>
        </form>
    </body>

</html>
