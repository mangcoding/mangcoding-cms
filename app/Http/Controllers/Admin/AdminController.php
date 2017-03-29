<?PHP
namespace App\Http\Controllers\Admin;
use	App\Http\Controllers\Controller;
use App\Pages, App\Categories;
use App\Admin as Madmin;
use Illuminate\Http\Request;
use Validator;
use App\Member;

class AdminController extends Controller {
	public function getIndex() {
		$member = Member::orderBy("created_at","DESC")->take(10)->get();
		$data['content'] = 'homepage';
		$data['members'] = $member;
		$data['x'] = 1;
        return view('admin', $data);
	}
	public function getAdd() {
		$data['content'] = 'add-admin';
		return view('admin', $data);
	}
	public function getAccount() {
		$data["admins"] = Madmin::findOrFail(\Auth::user()->adminid);
		$data['content'] = 'admin-acc';
		return view('admin', $data);
	}
	public function postAccount(Request $request) {
		$adminid = \Auth::user()->adminid;
		return $this->postEdit($request, $adminid);
	}
	public function getEdit($adminid) {
		$data["posts"] = Madmin::findOrFail($adminid);
		$data['content'] = 'add-admin';
		return view('admin', $data);
	}
	public function getHapus($adminid) {
		$admin = Madmin::find($adminid);
        $admin->delete();
        return \Redirect::back()->with('message', 'Admin berhasil di hapus');
	}
	public function postAdd(Request $request) {
		$validator = Validator::make($request->all(), [
			"adminName"             => 'required|max:255|unique:admins,adminName',
			"email"                 => 'required|max:255|unique:admins,email',
			'pass'                  => 'required|min:6|max:255',
			'fullName'              => 'required',
			'phone'                 => 'required',
			'password_confirmation' => 'same:pass'
        ]);

        if ($validator->fails()) {
            return \Redirect::back()->withErrors($validator)->withInput();
        }else{
            $request->merge(["password"=> bcrypt($request->pass)]);
            $image = $request->file('ImgAvatar'); 
            if ($image) {
                $avatar = function() use ($image){
                    $filename  = time() . '.' . $image->getClientOriginalExtension();
                    $Thumb = public_path('uploads/admin/' . $filename);
                    \Image::make($image->getRealPath())->fit(200, 200)->save($Thumb);
                    return url('uploads/admin/'.$filename);
                };
                $request->merge(["avatar"=>$avatar()]);          
            }
            $request->merge(["level"=>1]);   
            Madmin::create($request->except("_token","ImgAvatar","pass","password_confirmation"));
            return \Redirect::back()->with('message', 'Admin berhasil di simpan');
        }	
	}
	public function postEdit(Request $request, $adminid) {
		$validator = Validator::make($request->all(), [
			"adminName"             => 'required|max:255|unique:admins,adminName,'.$adminid.',adminid',
			"email"                 => 'required|max:255|unique:admins,email,'.$adminid.',adminid',
			'fullName'              => 'required',
			'phone'                 => 'required',
			'password_confirmation' => 'same:pass'
        ]);

        if ($validator->fails()) {
            return \Redirect::back()->withErrors($validator)->withInput();
        }else{
            if ($request->pass !="") {
                $request->merge(["password"=> bcrypt($request->pass)]);
            }
            $image = $request->file('ImgAvatar'); 
            if ($image) {
                $avatar = function() use ($image){
                    $filename  = time() . '.' . $image->getClientOriginalExtension();
                    $Thumb = public_path('uploads/admin/' . $filename);
                    \Image::make($image->getRealPath())->fit(200, 200)->save($Thumb);
                    return url('uploads/admin/'.$filename);
                };
                $request->merge(["avatar"=>$avatar()]);          
            }
            Madmin::where('adminid', $adminid)->update($request->except("_token","ImgAvatar","pass","password_confirmation"));
            return \Redirect::back()->with('message', 'Admin berhasil di simpan');
        }	
	}
	public function getManage(Request $request){
		$posts = Madmin::paginate(10);
		$data['content'] = 'admin';
		$data['admins'] = $posts;
		$x = isset($request->page)? $request->page : 1;
		$data['x'] = ($x-1)*10+1;
        return view('admin', $data);
	}
	//contents
}