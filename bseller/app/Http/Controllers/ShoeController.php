<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Shoe;
use Illuminate\Support\Facades\Storage;
use App\Interfaces\ImageStorage;


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

    public function delete(string $id): RedirectResponse
    {
        $shoe = Shoe::findOrFail($id);

        $storeInterface = app(ImageStorage::class);
        $nameImagen = $storeInterface->delete($shoe->getImage());

        Shoe::destroy($shoe->getId());
        session()->flash('status', 'Shoe deleted Success');
        return redirect()->route('shoe.list');
    }

    public function save(Request $request):RedirectResponse
    {
        $newShoe = new Shoe;
        $validatedData = Shoe::validate($request);

        $storeInterface = app(ImageStorage::class);
        $nameImagen = $storeInterface->store($request);

        if($nameImagen == "Error")
        {
            return redirect()->back()->withInput()->withErrors(['image.save_error'=>'An error occurred while saving the image']);
        }

        $newShoe->setPrice($validatedData['price']);
        $newShoe->setSize($validatedData['size']);
        $newShoe->setBrand($validatedData['brand']);
        $newShoe->setModel($validatedData['model']);
        $newShoe->setImage($nameImagen);

        $newShoe->save();
        session()->flash('status', 'Shoe created successfully.');
        // Redirect to the new newShoe's detail page
        return redirect()->route('shoe.show', ['id' => $newShoe->getId()]);
    }
}
