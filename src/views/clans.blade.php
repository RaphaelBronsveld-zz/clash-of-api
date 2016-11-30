<!DOCTYPE html>
<html>
<head>
    <title>Laravel Clash Of API</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <style>
        html, body {
            height: 100%;
        }
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato', sans-serif;
        }
        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }
        .content {
            margin-top: 50px;
            text-align: center;
            display: inline-block;
        }
        .title {
            font-size: 30px;
        }

        .clashtitle {
            font-size: 50px;
        }
        .footer {
            font-size: 40px;
        }
        .clashcontainer {
            padding-top: 30px;
            font-size: 30px;
        }
        ul li {
            margin: 0;
            padding: 0;
            display: inline-block;
        }
    </style>
</head>
<body>
<div class="container">
    <div id="app" class="content">
        <div class="title"><h1>Clash Of Clans API</h1></div>
        <div class="footer">By <a target="blank" href="https://github.com/raphaelbronsveld">Raphaël Bronsveld</a></div>
            <div class="clashcontainer">
                <div class="clashtitle">Clans</div>
                    @foreach($clans as $clan)
                        <ul>
                            <li>
                                Clanname: {{ $clan->name }}
                            <br>
                                Tag: {{ $clan->tag }}
                            </li>
                        </ul>
                    @endforeach
            </div>
        </div>
    </div>
</body>
</html>
