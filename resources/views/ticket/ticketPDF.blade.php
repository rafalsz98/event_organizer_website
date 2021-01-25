<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ticket</title>
    <style>
        body {
            background-color: #f2f2f2;
        }
        h2 {
            padding-left: 70px;
        }
        p {
            font-size: 13px;
        }
        body {
            border: 3px outset darkgreen;
        }
    </style>
</head>
<body>
    <h2>{{$name}}</h2>
    <table style="width: 600px">
        <tr>
            <th>
                <div class="px-10">
                    <img src="https://picsum.photos/200/300?random=1" width="256" height="256">
                </div>
            </th>
            <th>
                <p style="text-decoration: underline">when:</p>
                <p>{{$datestart}}</p>
                <p style="text-decoration: underline">how long:</p>
                <p>{{$duration}}</p>
                <p style="text-decoration: underline">where:</p>
                <p>{{$place}}</p>
                <p style="text-decoration: underline">how much: {{$price}}</p><br>
                <p style="text-decoration: underline">Your email:</p>
                <p>{{$email}}</p>
            </th>
        </tr>
    </table>
</body>
</html>
