
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style link="{{asset("css/app.css")}}"></style>
    <title>Document</title>
</head>
<body>
        <div style="position: static ">
            {{ __("You're otp code!") }}
        </div>
        <div >
            {{ $otp_code }}
        </div>
</body>
</html>