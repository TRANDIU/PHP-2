<?php

namespace Php2\Exam\Controllers;

use Php2\Exam\Commons\Controller;
use Php2\Exam\Models\Product;
use Php2\Exam\Models\Category;
use Validator; // Ensure this is the correct namespace for the Validator class

class HomeController extends Controller
{
    private Product $product;
    private Category $category;

    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
    }

    public function index()
    {
        $allProducts = $this->product->all();
        // debug($allProducts);
        // die();
        $this->renderView('products.index', [
            'allProducts' => $allProducts
        ]);
    }

    public function create()
    {
        $categories = $this->category->all();
        $categories = array_column($categories, 'name', 'id');
        $this->renderView('products.create', [
            'categories' => $categories
        ]);
    }

    // public function store()
    // {
    //     $validator = new Validator();
    //     $validation = $validator->make($_POST + $_FILES, [
    //         'category_id' => 'required',
    //         'name' => 'required',
    //         'img_thumbnail' => 'required',
    //         'description' => 'required',
    //     ]);

    //     if ($validation->fails()) {
    //         // Handle validation failure
    //         // This could be redirecting back to the form with errors, for example
    //         // return back()->withErrors($validation->errors());
    //         return;
    //     }

    //     // Save the product if validation passes
    //     // $this->product->create(...);
    // }

    public function edit($id)
    {
        $product = $this->product->find($id);
        if (!$product) {
            // Handle the case where the product doesn't exist
            // For example, you could redirect to the index page with an error message
            // return redirect('products')->with('error', 'Product not found.');
            return;
        }
        
        $this->renderView('products.edit', ['product' => $product]);
    }

    public function update($id)
    {
        $product = $this->product->find($id);
        if (!$product) {
            // Handle the case where the product doesn't exist
            // return redirect('products')->with('error', 'Product not found.');
            return;
        }

        // Validate and update the product
        // $validator = new Validator();
        // $validation = $validator->make($_POST + $_FILES, [...]);
        // if ($validation->fails()) {
        //     return back()->withErrors($validation->errors());
        // }
        // $this->product->update($id, [...]);
    }

    public function delete($id)
    {
        $product = $this->product->find($id);
        if (!$product) {
            // Handle the case where the product doesn't exist
            // return redirect('products')->with('error', 'Product not found.');
            return;
        }

        $this->product->delete($id);
        $img = $product['img_thumbnail'];
        if ($img && file_exists(PATH_ROOT . $img)) {
            unlink(PATH_ROOT . $img);
        }

        header('Location: ' . url('products'));
        exit; // It's a good practice to call exit after header redirection
    }
}
