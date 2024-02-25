<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $name)
    {
        if ($name === 'Administrator') {
            if (Auth::guard('api')->check()) {
                return view('Auth.index', [
                    'ttnguoidung' =>   Auth::guard('api')->user(),
                    'user' => User::all(),
                ]);
            } else {
                return view('Auth.login');
            }
        }
        return view('welcome');
    }
    public function login()
    {
        return view('Auth.login');
    }
    public function loginuser(Request $request)
    {

        // dd('a');
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $users = User::where("email", $request->input('email'))->first();
        if ($credentials) {
            if (Hash::check($request->password, $users->password)) {
                Auth::guard('api')->login($users);
                if (Auth::guard('api')->check()) {

                    return view(
                        'Auth.index',
                        [
                            'ttnguoidung' =>   Auth::guard('api')->user(),
                            'user' => User::all(),
                        ]
                    );
                }
            } else {
                return view('Auth.login');
            }
        } else {
            return view('Auth.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function doimatkhau()
    {
        return view('Auth.qlnguoidung.doimatkhau', [
            'ttnguoidung' =>   Auth::guard('api')->user(),
            'loi' => ''
        ]);
    }
    public function themnguoidung()
    {
        return view('Auth.qlnguoidung.themnguoidung', [
            'ttnguoidung' =>   Auth::guard('api')->user(),

        ]);
    }
    public function themnd(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'txtemail' => ['required', 'email'],
            'txtmatkhau' => ['required'],
            'txthinh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'txthoten' => ['required'],
            'optloaind' => ['required'],
        ]);
        $generatedimage = 'img' . time() . '-' . $request->file('txthinh')->getClientOriginalName();
        $request->file('txthinh')->move(public_path('img'), $generatedimage);
        $user = new User();
        $user->name = $request->input('txthoten');
        $user->password = Hash::make($request->input('txtmatkhau'));
        $user->email = $request->input('txtemail');
        $user->image = $generatedimage;
        $user->user_type = $request->input('optloaind');
        $user->status = 1;
        $user->save();
        return redirect()->intended('/Administrator');
    }
    public function themdm(Request $request)
    {
        $request->validate([

            'txttendanhmuc' => ['required'],
            'txthinh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $generatedimage = 'img' . time() . '-' . $request->file('txthinh')->getClientOriginalName();
        $request->file('txthinh')->move(public_path('img'), $generatedimage);
        $danhmuc = new DanhMuc();
        $danhmuc->tendanhmuc = $request->input('txttendanhmuc');
        $danhmuc->hinh = $generatedimage;
        $danhmuc->save();
        return view('Auth.qldanhmuc.listdanhmuc', [
            'ttnguoidung' =>   Auth::guard('api')->user(),
            'danhmuc' => DanhMuc::all(),

        ]);
    }
    public function logoutadmin()
    {
        Auth::guard('api')->logout();

        return  redirect()->intended('/Administrator');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(string $id, Request $request)
    {

        if (strpos($id, '&') !== false) {
            $parts = explode('&', $id);
            if (count($parts) == 3 && is_numeric($parts[0]) && is_numeric($parts[1]) && is_string($parts[2])) {
                if ($parts[2] == 'users') {
                    $user = User::where('id', $parts[0])
                        ->update([
                            'status' => $parts[1],
                        ]);

                    return redirect()->intended('/Administrator');
                }
            }
            if (count($parts) == 2 && is_numeric($parts[0]) && is_string($parts[1])) {
                if ($parts[1] === 'userde') {
                    $user = User::where('id', $parts[0])
                        ->delete();

                    return redirect()->intended('/Administrator');
                }

                if ($parts[1] === 'suadm') {

                    $danhmuc = DanhMuc::where('id', $parts[0])->first();

                    return view('Auth.qldanhmuc.suadanhmuc', [
                        'ttnguoidung' =>   Auth::guard('api')->user(),
                        'danhmuc' => $danhmuc,

                    ]);
                }
                if ($parts[1] === 'xoadm') {
                    $user = DanhMuc::where('id', $parts[0])
                        ->delete();

                    return view('Auth.qldanhmuc.listdanhmuc', [
                        'ttnguoidung' =>   Auth::guard('api')->user(),
                        'danhmuc' => DanhMuc::all(),

                    ]);
                }
            }

            if (count($parts) == 2 && is_numeric($parts[1]) && is_string($parts[0])) {
                if ($parts[0] == 'suasanpham') {
                    $sanpham = SanPham::where('id', $parts[1])
                        ->first();
                    return view('Auth.qlsanpham.suasanpham', [
                        'ttnguoidung' =>   Auth::guard('api')->user(),
                        'sanpham' => $sanpham,
                        'danhmuc' => DanhMuc::all()
                    ]);
                }
                if ($parts[0] === 'xoasanpham') {
                    $sanpham = SanPham::where('id', $parts[1])
                        ->delete();

                    return view('Auth.qlsanpham.sanpham', [
                        'ttnguoidung' =>   Auth::guard('api')->user(),
                        'sanpham' => SanPham::all(),

                    ]);
                }
            }
        }
    }
    public function doimk(Request $request)
    {
        $request->validate([
            'txtpascu' => ['required'],
            'txtmatkhaumoi' => ['required'],
            'txtmatkhaumoixn' => ['required'],
        ]);
        $user = User::where('id', $request->input('iduser'))->first();

        if (Hash::check($request->input('txtpascu'), $user->password)) {
            if ($request->input('txtmatkhaumoi') === $request->input('txtmatkhaumoixn')) {
                $us = User::where('id', $request->input('iduser'))->update([
                    'password' => Hash::make($request->input('txtmatkhaumoi')),
                ]);
                Auth::guard('web')->logout();

                return  redirect()->intended('/Administrator/login');
            } else {
                $se = 'Lỗi,mật khẩu không giống nhau';
                return view('Auth.qlnguoidung.doimatkhau', ['ttnguoidung' =>  Auth::guard('web')->user(), 'loi' => $se]);
            }
        } else {
            $se = 'Lỗi,mật khẩu cũ';
            return view('Auth.qlnguoidung.doimatkhau', ['ttnguoidung' =>  Auth::guard('web')->user(), 'loi' => $se]);
        }
    }
    /**
     * Display the specified resource.
     */
    public function hoso()
    {
        return view('Auth.qlnguoidung.profile', [
            'ttnguoidung' =>   Auth::guard('api')->user(),

        ]);
    }
    public function qlthanhtoan()
    {
        return view('Auth.qlnguoidung.profile', [
            'ttnguoidung' =>   Auth::guard('api')->user(),

        ]);
    }
    public function qldanhmuc()
    {
        return view('Auth.qlcart.listthanhtoan', [
            'ttnguoidung' =>   Auth::guard('api')->user(),
            'user'=>User::all(),
            'sanpham'=>SanPham::all(),
            'danhmuc' => DanhMuc::all(),
            'cart' => Cart::all(),

        ]);
    }
    public function themdanhmuc()
    {
        return view('Auth.qldanhmuc.themdanhmuc', [
            'ttnguoidung' =>   Auth::guard('api')->user(),
            'danhmuc' => DanhMuc::all(),

        ]);
    }
    public function suamdm(Request $request)
    {

        $request->validate([
            'txttendanhmuc' => ['required'],

            'txthinh' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->file('txthinh') != null) {

            $generatedimage = 'image' . time() . '-' . $request->file('txthinh')->getClientOriginalName();
            $request->file('txthinh')->move(public_path('images'), $generatedimage);
            $danhmuc = DanhMuc::where('id', $request->input('iddanhmuc'))
                ->update([
                    'tendanhmuc' => $request->input('txttendanhmuc'),
                    'imagemusic' => $generatedimage,

                ]);
            return view('Auth.qldanhmuc.listdanhmuc', [
                'ttnguoidung' =>   Auth::guard('api')->user(),
                'danhmuc' => DanhMuc::all(),

            ]);
        } else {
            $danhmuc = DanhMuc::where('id', $request->input('iddanhmuc'))
                ->update([
                    'tendanhmuc' => $request->input('txttendanhmuc'),


                ]);
            return view('Auth.qldanhmuc.listdanhmuc', [
                'ttnguoidung' =>   Auth::guard('api')->user(),
                'danhmuc' => DanhMuc::all(),

            ]);
        }
    }
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($id == 'suand') {
            $request->validate([

                'fhinh' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                // 'txthinhanhcu' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'txthoten' => ['required'],
            ]);

            if ($request->file('fhinh') != null) {
                $generatedimage = 'image' . time() . '-' . $request->file('fhinh')->getClientOriginalName();
                $request->file('fhinh')->move(public_path('images'), $generatedimage);
                $user = User::where('id', $request->input('txtiduser'))
                    ->update([
                        'name' => $request->input('txthoten'),
                        'image' => $generatedimage
                    ]);
            } else {
                $user = User::where('id', $request->input('txtiduser'))
                    ->update([
                        'name' => $request->input('txthoten'),

                    ]);
            }


            return redirect()->intended('/Administrator/hoso');
        }
    }

    public function qlsanpham()
    {
        return view('Auth.qlsanpham.sanpham', [
            'ttnguoidung' =>   Auth::guard('api')->user(),
            'sanpham' => SanPham::all(),

        ]);
    }

    public function themsanpham()
    {
        return view('Auth.qlsanpham.themsanpham', [
            'ttnguoidung' => Auth::guard('api')->user(),
            'danhmuc' => DanhMuc::all()
        ]);
    }
    public function nutThemSanPham(Request $request)
    {
        $request->validate([
            'txttensp' => 'required',
            'txtgia' => 'required',
            'txthinh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'optdanhmuc' => 'required',
            'txtslton' => 'required',
            'txtdaban' => 'required',
        ]);

        $hinh = 'img' . time() . '-' . $request->file('txthinh')->getClientOriginalName();
        $request->file('txthinh')->move(public_path('img'), $hinh);

        $sanpham = new SanPham();
        $sanpham->tensanpham = $request->input('txttensp');
        $sanpham->gia = $request->input('txtgia');
        $sanpham->hinh = $hinh;
        $sanpham->mota = $request->input('txtmota');
        $sanpham->danhgia = 0;
        $sanpham->id_danhmuc = $request->input('optdanhmuc');
        $sanpham->soluongton = $request->input('txtslton');
        $sanpham->soluongdaban = $request->input('txtdaban');
        $sanpham->save();
        return view('Auth.qlsanpham.sanpham', [
            'ttnguoidung' =>   Auth::guard('api')->user(),
            'sanpham' => SanPham::all(),

        ]);
    }

    public function suasanpham(string $id)
    {
        if (strpos($id, '&') !== false) {
            $parts = explode('&', $id);
            if (count($parts) == 2 && is_numeric($parts[1]) && is_string($parts[0])) {
                if ($parts[0] == 'suasanpham') {
                    $sanpham = SanPham::where('id', $parts[1])
                        ->get();
                    return redirect()->intended('/Administrator/qlsanpham');
                }
            }
        }
    }

    public function nutSuaSanPham(Request $request)
    {
        $request->validate([
            'txttensp' => 'required',
            'txtgia' => 'required',
            'txthinh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'optdanhmuc' => 'required',
            'txtslton' => 'required',
            'txtdaban' => 'required',
        ]);
        if ($request->file('txthinh') != null) {

            $generatedimage = 'image' . time() . '-' . $request->file('txthinh')->getClientOriginalName();
            $request->file('txthinh')->move(public_path('images'), $generatedimage);
            $sanpham = SanPham::where('id', $request->input('idsanpham'))
                ->update([
                    'tensanpham' => $request->input('txttensp'),
                    'gia' => $request->input('txtgia'),
                    'hinh' => $generatedimage,
                    'mota' => $request->input('txtmota'),
                    'soluongton' => $request->input('txtslton'),
                    'soluongdaban' => $request->input('txtdaban'),

                ]);
            return view('Auth.qlsanpham.sanpham', [
                'ttnguoidung' =>   Auth::guard('api')->user(),
                'sanpham' => SanPham::all(),

            ]);
        } else {
            $sanpham = SanPham::where('id', $request->input('iddanhmuc'))
                ->update([
                    'tensanpham' => $request->input('txttensp'),
                    'gia' => $request->input('txtgia'),
                    'mota' => $request->input('txtmota'),
                    'soluongton' => $request->input('txtslton'),
                    'soluongdaban' => $request->input('txtdaban'),
                ]);
            return view('Auth.qlsanpham.sanpham', [
                'ttnguoidung' =>   Auth::guard('api')->user(),
                'sanpham' => SanPham::all(),

            ]);
        }
    }






    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}