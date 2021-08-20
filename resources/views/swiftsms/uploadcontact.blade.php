<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Upload Contact</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <link rel="stylesheet" href="css/bootstrap3.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">
        <link rel="stylesheet" href="css/swiftsms.css">

   </head>
<body>
    <div class="container">
        <div class="form">
            <form action="{{ route('upload')}}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="file">
                </div>
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    




    @include("includes.scripts")
</body>
</html>