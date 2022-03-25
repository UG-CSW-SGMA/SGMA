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
    </style>
</head>

<body>
    <div style="display: inline-flexbox; text-align: center;">
        <br>
        <h3>{{$emp->RazonSocial}}</h3>
        <h4>{{$emp->NombreComercial}}</h4>
        <h4>RUC: {{$emp->RUC}}</h4>
        <h1>REPORTE DE NUEVOS CLIENTES</h1>
        <br>
    </div>
    <div>
        {{$lblrango}}
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