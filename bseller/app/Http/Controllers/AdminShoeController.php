<?php

namespace App\Http\Controllers;

use App\Interfaces\ImageStorage;
use App\Models\Shoe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminShoeController extends Controller
{
    public function create(): View
    {
        return view('admin.shoeCreate');
    }

    public function list(): View
    {
        $viewData = [];
        $viewData['shoes'] = Shoe::all();

        return view('admin.shoeList')->with('viewData', $viewData);
    }

    public function delete(string $id): RedirectResponse
    {
        $shoe = Shoe::findOrFail($id);

        $storeInterface = app(ImageStorage::class);
        if (! $storeInterface->delete($shoe->getImage())) {
            return redirect()->back()->withInput()->withErrors(['image.save_error' => 'An error occurred while deleting the image']);
        }

        Shoe::destroy($shoe->getId());
        session()->flash('status', 'Shoe deleted Success');

        return redirect()->route('admin.shoeList');
    }

    public function save(Request $request): RedirectResponse
    {
        $newShoe = new Shoe;
        $validatedData = Shoe::validate($request);

        $storeInterface = app(ImageStorage::class);
        $nameImagen = $storeInterface->store($request);

        if ($nameImagen == 'Error') {
            return redirect()->back()->withInput()->withErrors(['image.save_error' => 'An error occurred while saving the image']);
        }

        $newShoe->setPrice($validatedData['price']);
        $newShoe->setSize($validatedData['size']);
        $newShoe->setBrand($validatedData['brand']);
        $newShoe->setModel($validatedData['model']);
        $newShoe->setImage($nameImagen);

        $newShoe->save();
        session()->flash('status', 'Shoe created successfully.');
        // Redirect to the new newShoe's detail page
        return redirect()->route('admin.shoeList');
    }

    public function show(string $id): View
    {
        $viewData = [];
        $shoeInfo = Shoe::findOrFail($id);
        $viewData['title'] = 'Products - Bseller';
        $viewData['shoe'] = $shoeInfo;

        return view('admin.shoeShow')->with('viewData', $viewData);
    }
}