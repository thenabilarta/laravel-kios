<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prod = Product::all();
        return view('index', compact('prod'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagePath = request('gambar')->store('uploads', 'public');
        $image = basename($imagePath);

        Product::create([
            'product_id' => $request->id,
            'product_name' => $request->nama,
            'product_price' => $request->harga,
            'product_image' => $image,
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $imagePath = request('gambar')->store('uploads', 'public');
        $image = basename($imagePath);

        Product::where('id', $product->id)->update([
            'product_id' => $request->id,
            'product_name' => $request->nama,
            'product_price' => $request->harga,
            'product_image' => $image,
        ]);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);
        return redirect('/');
    }

    public function fetch() {
        $client = new Client();
        $res = $client->get('https://resto.technopresent.com/api/productlist/3');
        
        $contents =  $res->getBody();
        $content = json_decode($contents, true);

        $product = array();
        $counter = 0;

        foreach ($content["products"] as $value) {
            foreach ($value["products"] as $pd) {
                $product[$counter]["id"] = $pd["id"];
                $product[$counter]["title"] = $pd["title"];
                $product[$counter]["price"] = $pd["price"]["price"];
                $product[$counter]["image"] = basename($pd["preview"]["content"]);
                $counter++;
            }
        }

        // echo "<pre>";
        // var_dump($product);
        // echo "</pre>";

        foreach ($product as $prod) {
            $string = file_get_contents('https://resto.technopresent.com/uploads/20/09/' . $prod["image"]);
            $handle = fopen('storage/uploads/' . $prod["image"], "w");
            fwrite($handle, $string);
            fclose($handle);

            Product::create([
                'product_id' => $prod["id"],
                'product_name' => $prod["title"],
                'product_price' => $prod["price"],
                'product_image' => $prod["image"],
            ]);
        }

        return redirect('/');
    }
}