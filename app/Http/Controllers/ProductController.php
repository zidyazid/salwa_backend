<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Product;
use App\models\ProductGallery;
// import validation request
use App\Http\Requests\ProductRequest;
// import helper str(string)
use Illuminate\Support\str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
        $data['produk'] = Product::all();
        return view('pages.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        
        // dd($data);
        Product::create($data);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // findOrFail menghindari error dan memunculkan pesan 404 seandainya data tidak ditemukan
        $data['old_product']=Product::findOrFail($id);
        return view('pages.product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $old_product = Product::findOrFail($id);
        $old_product->update($data);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /* dikarenakan pada pembuatan table telah didefinisikan softdelete maka pada saat data
         dihapus data tidak akan hilang dari database namun hilang atau terhapus pada tampilan */
        $old_product = Product::findOrFail($id);
        $old_product->delete();

        ProductGallery::where('products_id', $id)->delete();

        return redirect()->route('products.index');
    }
    public function galleries(Request $request, $id)
    {
        $data['product'] = Product::findOrFail($id);
        $data['item'] = ProductGallery::with('product')
                ->where('products_id', $id)
                ->get();

        return view('pages.product.gallery', $data);
    }
}
