<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Shoe;
use Illuminate\Support\Facades\Storage;
use Redirect;


class ShoeController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Products - Bseller";
        $viewData["shoes"] = Shoe::all();
        return view('shoe.index')->with("viewData", $viewData);
    }

    public function show(string $id): View
    {
        $viewData=[];
        $shoeInfo = Shoe::findOrFail($id);
        $viewData["title"] = "Products - Bseller";
        $viewData["shoe"] = $shoeInfo;
        return view('shoe.show')->with("viewData", $viewData);
    }

    public function create(): View
    {
        return view('shoe.create');
    }

    public function list(): View
    {   
        $viewData=[];
        $viewData['shoes'] = Shoe::all();
        return view('shoe.list')->with("viewData", $viewData);
    }

    public function delete(string $id)
    {
        $shoe = Shoe::findOrFail($id);
        $dir = $shoe->getImage();
        Storage::disk('local')->delete($dir);
        Shoe::destroy($shoe->getId());
        session()->flash('status', 'Shoe deleted Success');
        return redirect()->route('shoe.list');
    }

    public function save(Request $request)
    {
        // Create new newShoe instance with form data
        $newShoe = new Shoe;
        $validatedData = Shoe::validate($request);
        //Try to save a show image in the public directory
        $nameImagen = $newShoe->saveImage($request);

        if($nameImagen == "Error")
        {
            return redirect()->back()->withInput()->withErrors(['image.save_error'=>'An error occurred while saving the image']);
        }

        $newShoe->setPrice($validatedData['price']);
        $newShoe->setSize($validatedData['size']);
        $newShoe->setBrand($validatedData['brand']);
        $newShoe->setModel($validatedData['model']);
        $newShoe->setImage($nameImagen);

        // Save new newShoe to database
        $newShoe->save();
        // Flash success message to the session
        session()->flash('status', 'Shoe created successfully.');
        // Redirect to the new newShoe's detail page
        return redirect()->route('shoe.show', ['id' => $newShoe->getId()]);
    }
}
