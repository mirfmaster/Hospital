<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Invoice</title>

<body>
    <style type="text/css">
        .tg {
            border-collapse: collapse;
            border-spacing: 0;
            border-color: #ccc;
            width: 100%;
        }

        .tg td {
            font-family: Arial;
            font-size: 12px;
            padding: 10px 5px;
            border-style: solid;
            border-width: 1px;
            overflow: hidden;
            word-break: normal;
            border-color: #ccc;
            color: #333;
            background-color: #fff;
        }

        .tg th {
            font-family: Arial;
            font-size: 14px;
            font-weight: normal;
            padding: 10px 5px;
            border-style: solid;
            border-width: 1px;
            overflow: hidden;
            word-break: normal;
            border-color: #ccc;
            color: #333;
            background-color: #f0f0f0;
        }

        .tg .tg-3wr7 {
            font-weight: bold;
            font-size: 12px;
            font-family: "Arial", Helvetica, sans-serif !important;
            text-align: center;
        }

        .tg .tg-ti5e {
            font-size: 10px;
            font-family: "Arial", Helvetica, sans-serif !important;
            text-align: center;
        }

        .tg .tg-rv4w {
            font-size: 10px;
            font-family: "Arial", Helvetica, sans-serif !important;
        }

        .date {
            position: relative;
            top: 10%;
            left: 10%;
            font-size: 12px;
            font-family: Arial;
        }

        .QRCode {
            position: relative;
            top: 5%;
            left: 75%;
        }
    </style>

    <div style="font-family:Arial; font-size:12px;">
        <center>
            <h2>Medical Prescriptions</h2>
        </center>
    </div>
    <br>
    <table class="tg" style="width:80%;margin-left:auto;margin-right:auto">
        <tr>
            <th class="tg-3wr7">Prescription ID: </th>
            <th class="tg-3wr7">{{$prescription->id}}</th>
        </tr>
        <tr>
            <th class="tg-3wr7">Diagnose Result: </th>
            <th class="tg-3wr7">{{$prescription->diagnose}}</th>
        </tr>
        <tr>
            <th class="tg-3wr7">Doctor Name: </th>
            <th class="tg-3wr7">{{$prescription->doctor}}</th>
        </tr>
        <tr>
            <th class="tg-3wr7">Prescription: </th>
            <th class="tg-3wr7">{{$prescription->medical_prescription}}</th>
        </tr>
        <tr>
            <th class="tg-3wr7">Validity Period: </th>
            <th class="tg-3wr7">{{$prescription->validity_period}}</th>
        </tr>
        <tr>
            <th class="tg-3wr7">Created at: </th>
            <th class="tg-3wr7">{{$prescription->created_at}}</th>
        </tr>
    </table>
    <div class="date">
        This is valid medical prescriptions for {{$prescription->name}}<br>
        Generated with love at : {{Carbon\Carbon::now()->format('j F Y')}}
        and will be expired at : {{$prescription->validity_period}}
    </div>
    <div class="QRCode">
        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate('Make me into an QrCode!')) !!} ">
    </div>
</body>
</head>

</html> 