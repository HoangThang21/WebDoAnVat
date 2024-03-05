<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $lang = app()->call([LangController::class, 'langen_vi']);
        // dd($lang);
        return view('Client.index', ['lang' => $lang]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //   
    }
    public function search(Request $request)
    {

        $sanpham = SanPham::where('tensanpham', 'like', '%' . $request->input('txtsearch') . '%')->get();
        return view('Client.shop', ['sanphamsearch' => $sanpham]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    public function cart()
    {
        return view('Client.cart');
    }
    public function contact()
    {
        return view('Client.contact');
    }
    public function shop()
    {
        return view('Client.shop', ['sanphamsearch' => SanPham::all()]);
    }
    public function detailshop()
    {
        return view('Client.detailshop');
    }
    public function testimonial()
    {
        return view('Client.testimonial');
    }
    public function checkout()
    {
        return view('Client.checkout');
    }
    public function login()
    {
        return view('Client.login');
    }
    public function register()
    {
        return view('Client.cartregister');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
