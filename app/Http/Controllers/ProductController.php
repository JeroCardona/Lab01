<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public static $products = [
        ["id" => "1", "name" => "TV", "description" => "Best TV", "price" => 120],
        ["id" => "2", "name" => "iPhone", "description" => "Best iPhone", "price" => 999],
        ["id" => "3", "name" => "Chromecast", "description" => "Best Chromecast", "price" => 35],
        ["id" => "4", "name" => "Glasses", "description" => "Best Glasses", "price" => 60]
    ];


    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] =  "List of products";
        $viewData["products"] = ProductController::$products;
        return view('product.index')->with("viewData", $viewData);
    }



    public function show(string $id): View | RedirectResponse
    {
        // Convertimos $id a un entero
        $id = intval($id);

        // Check if the product index exists.
        if (!isset(ProductController::$products[$id - 1])) {
            return redirect()->route('home.index');
        }

        $viewData = [];
        $product = ProductController::$products[$id - 1];
        $viewData["title"] = $product["name"] . " - Online Store";
        $viewData["subtitle"] = $product["name"] . " - Product information";
        $viewData["product"] = $product;

        return view('product.show')->with("viewData", $viewData);
    }


    public function create(): View
    {
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Create product";

        return view('product.create')->with("viewData", $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        $request->validate([
            "name" => "required",
            "price" => "required|numeric|min:0.01"
        ]);
        //dd($request->all());
        //here will be the code to call the model and save it to the database
        return redirect()->route('product.success')->with('message', 'Product created');
    }
}
