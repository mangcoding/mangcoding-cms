<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
	</head>
	<style>
		table {border-spacing: 0; border-collapse: collapse;}
		table.tebal td {font-weight: bold;}
		table.bordered td {border: solid 1px #CCC;}
		.row {clear:both; margin-bottom:10px; display: block;}
		.label, label { float:left; min-width: 160px; }
		.isi { float:left; margin-left:20px;}
		p,h3,h4{clear:both; margin: 20px 0px;}
		.signature {font-weight:bold; margin-top:30px;}
	</style>
	<body>
		<h2>{{ $title }}</h2>
		<h2>{{ $informasi->seminar }}</h2>
		<div>
			<p>Yth Bpk./Ibu {{ $informasi->nama }},</p>
			<p>Selamat !!! Anda terlah terdaftar sebagai peserta dalam acara {{ $informasi->seminar }} pada hari {{ Helpers::indonesian_date($informasi->eventDate, "l, d F Y","") }}, di {{ $informasi->place }}, pukul {{ $informasi->eventHours }} dengan zona Waktu Indonesia Barat (WIB).</p>

			<p>Berikut adalah informasi lengkap terkait pendaftaran Anda :</p>
			

			<h3>Data Diri</h3>

			<table width="100%" cellpadding="5" cellspacing="0" border="1" class="bordered">
				<tr>
					<td width="165px">Nomer Invoice </td>
					<td width="5px">:</td>
					<td><strong>{{ $informasi->InvoiceNumber }}</strong></td>
				</tr>
				<tr>
					<td>Nomor Peserta</td>
					<td>:</td>
					<td><strong>{{ $informasi->noPeserta }}</strong></td>
				</tr>
				<tr>
					<td>Judul Seminar</td>
					<td>:</td>
					<td><strong>{{ $informasi->seminar }}</strong></td>
				</tr>
				<tr>
					<td>Categories </td>
					<td>:</td>
					<td>{{ $informasi->categories }}</td>
				</tr>
				<tr>
					<td>Nominal </td>
					<td>:</td>
					<td>{{ Helpers::number($informasi->nominal) }}</td>
				</tr>
				<tr>
					<td>Nama Lengkap </td>
					<td>:</td>
					<td>{{ $informasi->nama }}</td>
				</tr>
				<tr>
					<td>Email </td>
					<td>:</td>
					<td>{{ $informasi->email }}</td>
				</tr>
				<tr>
					<td>Institusi </td>
					<td>:</td>
					<td>{{ $informasi->institution }}</td>
				</tr>
				<tr>
					<td>No. Telepon </td>
					<td>:</td>
					<td>{{ $informasi->phoneNumber }} </td>
				</tr>
				<tr>
					<td>Rencana Judul Abstrak untuk Dipresentasikan (Jika berminat, kirim abstrak ke email.iiha@gmail.com)</td>
					<td>:</td>
					<td>{{ $informasi->topicPlan }}</td>
				</tr>
			</table>
			<h3 style="color:green; text-align: center">Status : APPROVED</h3>	
			<div class="row">
				<p><b>Mohon untuk diperhatikan !!!</b></p>
				<p><b>e-Mail ini harap <mark>DICETAK</mark> dan <mark>DIBAWA</mark> saat menghadiri Seminar {{ $informasi->seminar }} </b> untuk ditukarkan kepada Panitia Registrasi sebagai tanda bukti bahwa Anda telah melakukan pendaftaran dan pembayaran</p>
			</div>
			<p>Salam sukses,</p>
			<p>Panitia Seminar {{ $informasi->seminar }}</p>
			<table border="0" cellpadding="4" class="tebal">
				<tr>
					<td>Website</td>
					<td>:</td>
					<td>www.iiha.id</td>
				</tr>
				<tr>
					<td>E-mail</td>
					<td>:</td>
					<td>email.iiha@gmail.com</td>
				</tr>
				<tr>
					<td valign="top">Contact Person</td>
					<td>:</td>
					<td>
						{!! $kontak !!}
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>