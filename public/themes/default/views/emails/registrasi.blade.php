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
		<h2>{{ $seminar }}</h2>
		<div>
			<p>Yth. Bapak / Ibu  {{ $nama }},</p>
			<p>Terima kasih telah melakukan pendaftaran pada acara {{ $seminar }} pada hari {{ Helpers::indonesian_date($eventDate, "l, d F Y","") }}, di {{ $place }}, pukul {{ $eventHours }} dengan zona Waktu Indonesia Barat (WIB). Berikut ini adalah data-data yang telah Anda berikan :</p>

			<h3>Data Diri</h3>
			<table width="100%" cellpadding="5" cellspacing="0" border="1" class="bordered">
				<tr>
					<td width="165px">Nomer Invoice </td>
					<td width="5px">:</td>
					<td><strong>{{ $noInvoice }}</strong></td>
				</tr>
				<tr>
					<td>Judul Seminar</td>
					<td>:</td>
					<td><strong>{{ $seminar }}</strong></td>
				</tr>
				<tr>
					<td>Categories </td>
					<td>:</td>
					<td>{{ $categories }}</td>
				</tr>
				<tr>
					<td>Nominal </td>
					<td>:</td>
					<td>{{ Helpers::number($nominal) }}</td>
				</tr>
				<tr>
					<td>Nama Lengkap </td>
					<td>:</td>
					<td>{{ $nama }}</td>
				</tr>
				<tr>
					<td>Email </td>
					<td>:</td>
					<td>{{ $email }}</td>
				</tr>
				<tr>
					<td>Institusi </td>
					<td>:</td>
					<td>{{ $institution }}</td>
				</tr>
				<tr>
					<td>No. Telepon </td>
					<td>:</td>
					<td>{{ $phoneNumber }} </td>
				</tr>
				<tr>
					<td>Rencana Judul Abstrak untuk Dipresentasikan (Jika berminat, kirim abstrak ke email.iiha@gmail.com)</td>
					<td>:</td>
					<td>{{ $topicPlan }}</td>
				</tr>
			</table>	
			<div class="row">					
				<p><b>Langkah selanjutnya adalah</b> segera melakukan pembayaran melalui transfer ke akun bank dibawah ini <b>sesuai dengan jumlah nominal </b>yang tertera pada informasi di atas, agar pendaftaran Anda sebagai peserta Seminar Internasional dan Grand Launching IIHA dapat segera diproses.</p>
				<b>
					{!! $rekening !!}
				</b>
				<p><b>Setelah melakukan pembayaran</b>, harap melakukan konfirmasi pembayaran Anda dengan mempersiapkan foto bukti transfer, kemudian meng-klik link dibawah ini.</p>
				<h4 align="center"><a href="{{ $linkConfirm }}">Konfirmasi Pembayaran</a></h4>
				<p>(Jika link di atas tidak dapat diakses, silakan melakukan konfirmasi pembayaran melalui link berikut : <a href="{{ $altLink }}">{{ $altLink }}</a></p>
				<p><b>Setelah pembayaran terkonfirmasi,</b> maka kami akan memberikan informasi terkait <b>Nomor Peserta</b> Anda yang akan dikirimkan melalui email atau nomer telepon yang sudah Anda berikan.</p>

				<p>Demikian informasi diatas kami sampaikan. Atas perhatiannya, kami ucapkan terima kasih.</p>
				<p>Panitia Seminar Internasional dan Grand Launching IIHA.</p>
			</div>
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