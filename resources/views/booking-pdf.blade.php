<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>booking pdf</title>
    <style>
        *
        {
            margin:0;
            padding: 0;
        }

        .container
        {
            width: 70%;
            margin: 3% auto;
            padding: 10px;
            border: 1px solid red;
        }
        .left
        {
            float:left;
        }
        .right
        {
            float:right;
        }
        .clear
        {
            clear: both;
        }
        .navy-blue
        {
            color:navy
        }
        .sky-blue
        {
            color:skyblue
        }

        .w-68
        {
            width: 68%;
        }

        .w-28
        {
            width: 28%;
        }
        .red
        {
            color:red;
        }


    </style>
</head>
<body>
    <div class="container">
        {{-- heading section --}}
        <div>
            <div class="heaading w-68 left">
                <h1><span class="navy-blue">Booking</span><span class="sky-blue">.com</span></h1>
            </div>
            <div class="w-28 right">
                <div>
                    <p>Booking Confirmation</p>
                    <p><span class="red">Confiramtion Number:</span> <span class="sky-blue">42718.38473.38743</span></p>
                    <p><span class="red">Pin Code: </span><span class="sky-blue">2133</span></p>
                </div>
            </div>
    
            <div class="clear"></div>
        </div>

        <div>
            <div>
                <div>logo</div>
                <div>
                    <p>Address: 37 King Street East, M5c 1E9 Toronto</p>
                </div>
            </div>
        </div>
        


    </div>
</body>
</html>