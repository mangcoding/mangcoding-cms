<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use App\Seminar, App\Seminarpack, App\Registrant;

class Seminars extends Controller
{
	var $perPage = 10;
    public function index(Request $request){
		$data['content'] = 'seminar.list';
		$data['posts'] = Seminar::paginate($this->perPage);
		$x = isset($request->page)? $request->page : 1;
		$data['x'] = ($x-1)*$this->perPage+1;
        return view('admin', $data);
	}
    public function create() {
    	$data['content'] = 'seminar.add';
		return view('admin', $data);
    }
    public function edit($idSeminar=null) {
		if ($idSeminar==null) return Redirect::intended('/admin');
		$data['content'] = 'seminar.add';
		$data["seminar"] = Seminar::findOrFail($idSeminar);
		return view('admin', $data);
	}
    public function store(Request $request) {
    	$validator = $this->validator($request);
        if ($validator->fails()) {
            return \Redirect::back()
            ->withErrors($validator)
            ->withInput();
        }else{
            $gallery = function() use ($request){
                $image = $request->file('gambar'); 
                if ($image) {
                    $filename  = time() . '.' . $image->getClientOriginalExtension();
                    $Thumb = public_path('uploads/seminar/' . $filename);
                    \Image::make($image->getRealPath())->save($Thumb);
                    return url('uploads/seminar/'.$filename);
                }else{
                    return null;
                }
            };

            $attachment = function() use ($request){
                $attach = $request->file('attach'); 
                if ($attach) {
                    $fileName  = time() . '.' . $attach->getClientOriginalExtension();
                    $destinationPath = public_path('uploads/attachment');
                    $attach->move($destinationPath, $fileName);
                    return $fileName;
                }else{
                    return null;
                }
            };
            $package = ($request->package =="") ? '0' : '1';
            $request->merge(['package'=>$package,'images' => $gallery(), "attachment"=>$attachment()]);
            $seminar = Seminar::create($request->except('_token','gambar','cate','attach'));
            $categories = $request->cate;
            foreach ($categories as $categories) {
            	if ($categories["categories"] !="")
            	Seminarpack::insert(["idSeminar"=>$seminar->idSeminar, "categories"=>$categories["categories"],"price"=>$categories["price"]]);
            }
            return \Redirect::back()->with('message', 'Your Seminar was saved');
        }
    }

    private function validator(Request $request) {
		$validator = \Validator::make($request->all(),[
            'title'       => 'required',
            'gambar'      => 'mimes:jpg,jpeg,bmp,png',
            'attach'      => 'mimes:pdf,doc,docx,txt',
            'description' => 'required',
            'eventDate'   => 'required',
            'eventHours'  => 'required',
            'openRegist'  => 'required',
            'closeRegist' => 'required',
            'place'       => 'required',
            'contact'     => 'required',
            'memberPrice' => 'required'
        ]);
        return $validator;
	}
	public function update(Request $request, $idSeminar) {
		$validator = $this->validator($request);
        if ($validator->fails()) {
            return \Redirect::back()
            ->withErrors($validator)
            ->withInput();
        }else{
            $gallery = function() use ($request){
                $image = $request->file('gambar'); 
                if ($image) {
                    $filename  = time() . '.' . $image->getClientOriginalExtension();
                    $Thumb = public_path('uploads/seminar/' . $filename);
                    \Image::make($image->getRealPath())->save($Thumb);
                    return url('uploads/seminar/'.$filename);
                }
            };

            $attachment = function() use ($request){
                $attach = $request->file('attach'); 
                if ($attach) {
                    $fileName  = time() . '.' . $attach->getClientOriginalExtension();
                    $destinationPath = public_path('uploads/attachment');
                    $attach->move($destinationPath, $fileName);
                    return $fileName;
                }else{
                    return null;
                }
            };

            $package = ($request->package =="") ? '0' : '1';
            $request->merge(['package'=>$package]);
            if ($request->file('gambar') != "") $request->merge(["images"=>$gallery()]);
            if ($request->file('attach') != "") $request->merge(["attachment"=>$attachment()]);
            Seminar::where(["idSeminar"=>$idSeminar])->update($request->except('_token','gambar','cate','cateold','attach'));

            $categories = $request->cateold;
            foreach ($categories as $key=>$categories) {
            		if ($categories["categories"] !="")
            		Seminarpack::where(["idPacks"=>$key])
            					->update(["categories"=>$categories["categories"],"price"=>$categories["price"]]);
            }
            $categories = $request->cate;
            if (is_array($categories)) {
	            foreach ($categories as $key=>$categories) {
	            		if ($categories["categories"] !="")
	            		Seminarpack::insert(["idSeminar"=>$idSeminar, "categories"=>$categories["categories"],"price"=>$categories["price"]]);
	            }
	        }
                        		
            return \Redirect::back()->with('message', 'Your Seminar was saved');
        }
    }

    public function destroy($idSeminar) {
    	$cek = Registrant::where(["idSeminar"=>$idSeminar])->count();
    	if ($cek > 0)
    		return \Redirect::back()->with('message', 'Sudah ada peserta yang mengisi seminar ini. Seminar tidak dapat dihapus');
		$page = Seminar::findOrFail($idSeminar);
		$page->delete();
		return \Redirect::back()->with('message', 'Your Banner was deleted');
	}
	public function delete_cat($idPacks) {
		$page = Seminarpack::findOrFail($idPacks);
		$page->delete();
		return \Redirect::back()->with('message', 'Your Categories was deleted');
	}
}
