<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploading;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    use MediaUploading;
   
    public function index(): View
    {
        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    public function create(): View
    {
        $categories = Category::all()->pluck('name','id');

        return view('admin.products.create', compact('categories'));
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        $product = Product::create($request->validated() + ['code' =>  rand(1,1000)]);

        if($request->input('image', false)){
            $product->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        return redirect()->route('admin.products.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function show(Product $product): View
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product): View
    {
        $categories = Category::all()->pluck('name','id');

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->validated());

        if($request->input('image', false)){
            if(!$product->image || $request->input('image') !== $product->image->file_name){
                $product->image->delete();
                $product->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        }else if($product->image){
            $product->image->delete();
        }

        return redirect()->route('admin.products.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }

    public function massDestroy()
    {
        Product::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }

    public function search(Request $request){
        $products = Product::where('name', 'like', '%' . $request->search . '%')->get();
        
        return json_encode($products);
    }
}
