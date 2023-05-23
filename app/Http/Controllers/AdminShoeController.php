<?php

namespace App\Http\Controllers;

use App\Interfaces\ImageStorage;
use App\Models\Shoe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminShoeController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('admin.admin_shoes');
        return view('admin.shoes')->with('viewData', $viewData);
    }

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
            return redirect()->back()->withInput()->withErrors(['image.save_error' => __('shoes.error_delete_img')]);
        }

        Shoe::destroy($shoe->getId());
        session()->flash('status', __('shoes.success_delete'));

        return redirect()->route('admin.shoeList');
    }

    public function save(Request $request): RedirectResponse
    {
        $newShoe = new Shoe;
        $validatedData = Shoe::validate($request);

        $storage = $request->input('storage');

        $storeInterface = app(ImageStorage::class, ['storage' => $storage]);
        $nameImagen = $storeInterface->store($request);
        #dd($nameImagen);

        if ($nameImagen == 'Error') {
            return redirect()->back()->withInput()->withErrors(['image.save_error' => __('shoes.error_save_img')]);
        }

        $newShoe->setPrice($validatedData['price']);
        $newShoe->setSize($validatedData['size']);
        $newShoe->setBrand($validatedData['brand']);
        $newShoe->setModel($validatedData['model']);
        $newShoe->setImage($nameImagen);

        $newShoe->save();
        session()->flash('status', __('shoes.success_save'));
        // Redirect to the new newShoe's detail page
        return redirect()->route('admin.shoeList');
    }

    public function show(string $id): View
    {
        $viewData = [];
        $shoeInfo = Shoe::findOrFail($id);
        $viewData['title'] = __('shoes.products') . ' - Bseller';
        $viewData['shoe'] = $shoeInfo;

        return view('admin.shoeShow')->with('viewData', $viewData);
    }
}
