<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Shoes;
use Illuminate\Support\Facades\Storage;


class ShoeController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Products - Bseller";
        $viewData["subtitle"] =  "List of products";
        $viewData["products"] = Shoes::all();
        return view('shoe.index')->with("viewData", $viewData);
    }

    public function show(string $id): View
    {
        $viewData=[];
        $product = Shoes::findOrFail($id);
        $viewData["title"] = $product["name"]." - Bseller";
        $viewData["subtitle"] =  $product["name"]." - Product information";
        $viewData["product"] = $product;
        return view('shoe.show')->with("viewData", $viewData);

    }

    public function create(): View
    {
        return view('shoe.create');
    }

    public function list(): View
    {   
        $viewData=[];
        $viewData['shoes'] = Shoes::all();
        return view('shoe.list')->with("viewData", $viewData);
    }

    public function delete(Shoes $id)
    {
        $dir = $id->image;
        Storage::disk('local')->delete($dir);
        Shoes::destroy($id->id);
        session()->flash('status', 'Shoe deleted Success');
        return redirect()->route('shoe.list');
    }

    public function save(Request $request)
    {
        // Create new newShoe instance with form data
        $newShoe = new Shoes;
        $validatedData = Shoes::validate($request);

        $nombreImagen = $newShoe->saveImage($request);

        if($nombreImagen == "Error")
        {
            return redirect()->back()->withInput()->withErrors(['image.save_error'=>'An error occurred while saving the image was save']);
        }

        $newShoe->price = $validatedData['price'];
        $newShoe->size = $validatedData['size'];
        $newShoe->brand = $validatedData['brand'];
        $newShoe->model = $validatedData['model'];
        $newShoe->image = $nombreImagen;

        // Save new newShoe to database
        $newShoe->save();
        // Flash success message to the session
        session()->flash('status', 'Shoe created successfully.');
        // Redirect to the new newShoe's detail page
        return redirect()->route('shoe.show', ['id' => $newShoe->id]);
    }
}
