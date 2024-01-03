<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'price' => 'required|numeric',
                'rating' => 'required|numeric',
                'num_reviews' => 'required|integer',
                'image' => 'required|image',
                'link' => 'required|url',
                'sale' => 'boolean',
            ]);

            $imagePath = $request->file('image')->store('public/images');

            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->rating = $request->rating;
            $product->num_reviews = $request->num_reviews;
            $product->image_url = Storage::url($imagePath);
            $product->sale = $request->has('sale');
            $product->link = $request->link;
            $product->save();

            return redirect()->route('products.index')->with('success', 'Продукт успішно додано.');
        } catch (\Exception $e) {
            print('errr');
            Log::error('Помилка при збереженні продукту: ' . $e->getMessage());
            // Повернення до форми з повідомленням про помилку
            return back()->withErrors(['msg' => 'Помилка при збереженні продукту'])->withInput();
        }
    }

}