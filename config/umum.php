<?php
$usia= array();
$usia[""] = "Pilih Usia";
$usia["anak"] = "< 17 Tahun";
for($i=17; $i<=60; $i++) {
    $usia[$i] = $i. " Tahun";
}
$usia["tua"] = "> 60 Tahun";

return [
	'usia'           => $usia,
	'statusKaryawan' => ['1'=>'Tetap','2'=>'Tidak Tetap'],
	'status'         => ['0'=>'Non Aktif/PHK','1'=>'Aktif'],
	'statusAdmin'    => ['0'=>'Non Aktif','1'=>'Aktif'],
	'gender'         => ['L'=>'Laki-laki','P'=>'Perempuan'],
	'pendidikan'     => ["" =>"Pilih Pendidikan", "SD"  => "SD", "SMP" => "SMP", "SMA" => "SMA", "D1"  => "D1", "D2"  => "D2", "D3"  => "D3", "D4"  => "D4", "S1"  => "S1", "S2"  => "S2", "S3"  => "S3"],
	'religion'       => ["" =>"Pilih Agama","Islam"=>"Islam","Hindu"=>"Hindu","Budha"=>"Budha","Kristen Katholik"=>"Kristen Katholik","Kristen Protestan"=>"Kristen Protestan","Aliran Kepercayaan"=>"Aliran Kepercayaan"]
];