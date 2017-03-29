<?php	
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Member, App\Address, App\Education;
use App\City, App\Provincy, App\Regency, App\District;
use App\Registrant, App\Seminarpack;
use Validator;
use Excel, Helpers;
use DB;

class Export extends Controller	{	
    public function Registrant(Request $request) {
        $peserta = ($request->idseminar != null)? Registrant::pilih(["A.idSeminar"=>$request->idseminar]) : Registrant::pilih();
        if (count($peserta) == 0) abort(404);
        $header[] = ["No","Images","No. Peserta","No. Invoice", "idMember","Nama Lengkap","Email","Institution","No. Telepon","Seminar","Categories"];
        $x=1;

        foreach ($peserta as $detail) {
            if ($detail->idMember != "") {
                $categories = "Member";
            }else if ($detail->idPacks == "0") {
                $categories = "Reguler";
            }else{
                $detailPack = Seminarpack::find($detail->idPacks);
                $categories = $detailPack->categories;
            }

            $body[] = [$x, $detail->noPeserta, $detail->InoviceNumber, $detail->idMember, $detail->nama, $detail->email, $detail->institution, $detail->phoneNumber, $detail->seminar, $categories];
            $x++;
        }

        $data = array_merge($header, $body);
        Excel::create('Registrant', function($excel) use($data) {
            // Set the title
            $excel->setTitle('Data Peserta Seminar dari IIHA');
            // Chain the setters
            $excel->setCreator('auto generated from iiha.id')
                  ->setCompany('IIHA Organization');
            // Call them separately
            $excel->setDescription('Data Peserta Seminar IIHA');
            $excel->sheet('Registrant', function($sheet) use($data) {
                $sheet->setHeight(1, 40); //set row 1
                $sheet->setAutoSize(true);
                $sheet->setFontFamily('Calibri');
                $sheet->setFontSize(12);
                $sheet->setOrientation('landscape');
                $sheet->setPageMargin(0.25);
                $sheet->setAllBorders('thin');
                $sheet->cell('A1:J1', function($cells) {
                    $cells->setFontWeight('bold');
                    $cells->setAlignment('center');
                    $cells->setValignment('middle');
                    $cells->setValignment('center');
                    $cells->setBackground('#CCCCCC');
                    $cells->setFontColor('#000000');
                    $cells->setBorder('solid', 'none', 'none', 'solid');
                });
                $sheet->fromArray($data);
            });

        })->download('xls');

    }
    public function Member(Member $member, Request $request) {
        if (isset($request->filter)) {
            $members = $member->cari($request);
        }else{
            $members = $member->all();
        }
        $header[] = ["No","Avatar", "No. Anggota", "No. KTP","Nama Lengkap","Telepon","Email","Jenis Kelamin","Tempat Lahir","Tanggal Lahir", "Alamat", "No. Telepon Rumah","Pendidikan terakhir","Riwayat Pendidikan", "Sertifikasi","Tahun Mulai Berkarir","Perusahaan","Jabatan","No. Telepon Kantor"];
        $x=1;
        foreach ($members as $member) {
            $address = Address::where(["memberid"=>$member->memberid])->first();
            if ($address)
                $alamat = $address->jalan." Desa/Kelurahan ".District::name($address->village).", Kec. ".Regency::name($address->subdistricts)." ".City::name($address->district).". ".Provincy::name($address->province).", ".$address->zipcode; 
            else
                $alamat = "-";

            $education = "";
            $pendidikan = Education::where(["memberid"=>$member->memberid])->get();
            foreach ($pendidikan as $edu) {
                $education = "\n".$edu->eduYear." - ".$edu->eduGraduated." ".$edu->education." ".$edu->eduName." (".$edu->eduMayor.")";
            }
            $gender = ($member->gender !="") ? config('umum.gender')[$member->gender] : '-';
            $namaLengkap = $member->prefix." ".$member->fullName.", ".$member->subfix;
            $body[] = [$x, $member->avatar, $member->idMember, $member->civilizationNo, $namaLengkap, $member->phone, $member->email, $gender, $member->birthPlace, Helpers::indonesian_date($member->birthDate, "d F Y",""), $alamat, $member->homePhone, $member->education, $education, str_replace(";",",",$member->certificated),$member->startYear, $member->companyName, $member->position, $member->officePhone];
            $x++;
        }
        $data = array_merge($header, $body);
        Excel::create('Member', function($excel) use($data) {
            // Set the title
            $excel->setTitle('Data member dari IIHA');
            // Chain the setters
            $excel->setCreator('auto generated from iiha.id')
                  ->setCompany('IIHA Organization');
            // Call them separately
            $excel->setDescription('Data Member IIHA');
            $excel->sheet('Member', function($sheet) use($data) {
                $x=1;
                foreach ($data as $ava) {
                    if ($x !=1) {
                        $avatar = $ava[1] != "" && file_exists(public_path('uploads/avatar/'.$ava[1])) ? $ava[1] : "default.jpg";
                        $objDrawing = new \PHPExcel_Worksheet_Drawing;
                        $objDrawing->setPath(public_path('uploads/avatar/'.$avatar)); //your image path
                        $objDrawing->setWidthAndHeight(120,120);
                        $objDrawing->setResizeProportional(true);
                        $objDrawing->setCoordinates('B'.$x);
                        $objDrawing->setWorksheet($sheet);
                        $sheet->setSize('B' . $x, 120, 120);
                    }
                    $x++;
                }
                $sheet->setHeight(1, 40); //set row 1
                $sheet->setAutoSize(true);
                $sheet->setFontFamily('Calibri');
                $sheet->setFontSize(12);
                $sheet->setOrientation('landscape');
                $sheet->setPageMargin(0.25);
                $sheet->setAllBorders('thin');
                $sheet->cell('B1:Q'.$x, function($cells) {
                    $cells->setAlignment('left');
                    $cells->setValignment('center');
                });
                $sheet->cell('A1:Q1', function($cells) {
                    $cells->setFontWeight('bold');
                    $cells->setAlignment('center');
                    $cells->setValignment('middle');
                    $cells->setValignment('center');
                    $cells->setBackground('#CCCCCC');
                    $cells->setFontColor('#000000');
                    $cells->setBorder('solid', 'none', 'none', 'solid');
                });
                $sheet->fromArray($data);
            });

        })->download('xls');
    }
}