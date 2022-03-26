<!DOCTYPE html>
<html>
<title>Reporte de Nuevos Clientes</title>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            font-size: 0.7em;
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

        tfoot {
            display: table-footer-group;
            vertical-align: middle;
            border-color: inherit;
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
        <h3>REPORTE DE NUEVOS CLIENTES</h4>
            <br>
    </div>
    <br>
    <div style="padding-bottom: 4px;">
        <?php echo $lblrango ?>
    </div>
    <table>
        <thead>
            <tr>
                <th>Fecha Creacion</th>
                <th>DNI</th>
                <th>Cliente</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Direccion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
            <tr>
                @php $date = new DateTime($row->FechaCrecion);@endphp
                <td>{{ $date->format('d-m-Y')}}</td>
                <td>{{$row->DNI}}</td>
                <td>{{$row->Nombre . ' ' . $row->Apellido}}</td>
                <td>{{$row->Telefono}}</td>
                <td>{{$row->Email}}</td>
                <td>{{$row->Direccion}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td style="border: 0;"></td>
                <td style="border: 0;"></td>
                <td style="border: 0;"></td>
                <td style="border: 0;"></td>
                <td style="text-align: right;"><strong> Total de Registros =></strong></td>
                <td>{{count($data)}}</td>
            </tr>
        </tfoot>
    </table>
    <hr size="3" width="100%" color="black">
    <div style="display: inline-flexbox; padding-bottom: 4px;">
        @php
        $fgenera = new DateTime();
        $nombre_SS=Session('usuarioData')[0];
        @endphp
        <h6><strong> Generado por:</strong> {{$nombre_SS->NombreCompleto}} </h6>
    </div>
</body>

</html>