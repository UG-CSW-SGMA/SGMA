<!DOCTYPE html>
<html>
<title>Reporte de Nuevos Clientes</title>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin-top: 2px;
            margin-bottom: 2px;
        }
    </style>
</head>

<body>
    <div style="display: inline-flexbox; text-align: center;">
        <br>
        <h4 style="padding:0">{{$emp->RazonSocial}}</h4>
        <h5>{{$emp->NombreComercial}}</h5>
        <h5>RUC: {{$emp->RUC}}</h5>
        <br>
        <h4>REPORTE DE NUEVOS CLIENTES</h4>
        <br>
    </div>
    <div>
        <?php echo $lblrango ?>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Nommbre</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>
</body>

</html>