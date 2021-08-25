<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('styles/css/demo.css') }}">
    <title>SMS Sender Demo</title>
</head>

<body>


    <div class="form-components-container">
        <input class="field" type="text" name="username" id="username" placeholder="Username">
        <input class="field" type="password" name="password" id="password" placeholder="Password">

        <input class="field" type="text" name="sender" id="sender" placeholder="Sender">

        <textarea class="textarea" name="mobiles" id="mobiles" cols="30" rows="10" placeholder="Mobile Numbers"></textarea>

        <textarea class="textarea" name="message" id="message" cols="30" rows="10" placeholder="Enter Message"></textarea>

        <button class="" id="sendButton">Send Message</button>
    </div>


    <script src="{{ asset('js/demo.js') }}"></script>
</body>

</html>