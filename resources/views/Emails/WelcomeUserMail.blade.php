<!DOCTYPE html>
<html>
    <head>
        <title>Welcome Mail From {{env('APP_NAME')}}</title>
    </head>
    <body>
        <h1>Welcome Mail</h1>
        @if($details)
           <p>{{ $details['message'] }}</p>
        @endif
        <p>Thank you</p>
    </body>
</html>
