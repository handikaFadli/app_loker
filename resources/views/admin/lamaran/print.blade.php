<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Lamaran</title>
    <style>
			body, header, .body, footer {
					font-family: Arial, sans-serif;
			}
	
			header {
					text-align: center;
					border-bottom: 2px solid black;
			}
	
			header p {
					font-size: 35px;
					margin-bottom: 0px;
			}
	
			header span {
					display: block;
					margin-bottom: 20px;
					font-size: 20px;
			}
	
			.body {
					text-align: center;
			}
	
			.body p {
					margin-top: 20px;
					font-size: 25px;
					margin-bottom: 5px;
			}
	
			.body span {
					display: block;
					font-size: 20px;
					margin-bottom: 20px;
			}
	
			.body table {
					width: 80%; 
					margin: 0 auto;
					border: 1px solid grey;
			}
	
			.body table th {
					border-right: 1px solid grey;
					padding: 10px 0px;
			}
	
			.body table td {
					text-align: center;
					border-right: 1px solid grey;
					border-top: 1px solid grey;
					padding: 10px 0px;
			}
	
			footer table {
					margin-top: 30px;
					margin-right: 20px;
					float: right;
			}
	
			footer td {
					align-items: center;
					text-align: center;
			}
	
			footer p {
					align-items: center;
					text-align: center;
			}
	
			footer img {
					width: 10%;
			}
	</style>
	
</head>
<body>
    <header>
        <p>Universitas Catur Insan Cendekia</p>
        <span>Jl. Kesambi No.202, Kesambi, Kota Cirebon</span>
    </header>

    <div class="body">
        <p>Data Lamaran</p>
        <span>2024 - 2025</span>
        <table cellpadding="0" cellspacing="0">
					<tr>
						<th>No</th>
						<th>Nama Pelamar</th>
						<th>Lowongan</th>
						<th>Status Lamaran</th>
						<th>Tanggal Lamaran</th>
					</tr>
					@php
							\Carbon\Carbon::setLocale('id');
					@endphp
					@foreach($lamarans as $lamaran)
						<tr>
								<td>{{ $loop->iteration}}</td>
								<td>{{ $lamaran->pelamar->nama }}</td>
								<td>{{ $lamaran->lowongan->judul }}</td>
								<td>{{ $lamaran->status_lamaran }}</td>
								<td>{{ \Carbon\Carbon::parse($lamaran->created_at)->translatedFormat('d F Y') }}</td>
						</tr>
					@endforeach
        </table>
    </div>

    <footer>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <td>
                    Cirebon, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
                </td>
            </tr>
            <tr>
                <td>
                    <p>{{ 'ttd. '. ucwords(auth()->user()->role) }}</p>
                </td>
            </tr>
        </table>
    </footer>
</body>
</html>

