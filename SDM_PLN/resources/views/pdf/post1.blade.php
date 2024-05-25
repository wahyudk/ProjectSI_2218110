<!DOCTYPE html>
<html>
<head>
    <title>Data Absensi Pegawai</title>
    <style>
        body {
            text-align: center;
        }
        h2 {
            margin-top: 20px;
        }
        table {
            margin: auto;
            width: 80%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            text-align: center;
        }
        th, td {
            padding: 8px;
        }
    </style>
</head>
<body>
    <h2>Data Absensi Pegawai</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Pegawai</th>
                <th>Tanggal Masuk</th>
                <th>Jam Masuk</th>
                <th>Jam Pulang</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($post1 as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->idpegawai }}</td>
                    <td>{{ $item->tglmasuk }}</td>
                    <td>{{ $item->jammasuk }}</td>
                    <td>{{ $item->jampulang }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
