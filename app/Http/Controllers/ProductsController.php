<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Store;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Exception;

class ProductsController extends Controller
{

    /**
     * Display a listing of the products.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $products = Product::with('store', 'subcategory')->paginate(25);

        return view('salesman.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Stores = Store::pluck('id', 'id')->all();
        $SubCategories = SubCategory::pluck('name', 'id')->all();

        return view('salesman.products.create', compact('Stores', 'SubCategories'));
    }

    /**
     * Store a new product in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Product::create($data);

            return redirect()->route('products.product.index')
                ->with('success_message', 'Product was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified product.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $product = Product::with('store', 'subcategory')->findOrFail($id);

        return view('salesman.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $Stores = Store::pluck('id', 'id')->all();
        $SubCategories = SubCategory::pluck('name', 'id')->all();

        return view('salesman.products.edit', compact('product', 'Stores', 'SubCategories'));
    }


    /**
     * Update the specified product in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {

            $data = $this->getData($request);

            $product = Product::findOrFail($id);
            $product->update($data);

            return redirect()->route('products.product.index')
                ->with('success_message', 'Product was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified product from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();

            return redirect()->route('products.product.index')
                ->with('success_message', 'Product was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }


    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
            'store_id' => 'required',
            'sub_category_id' => 'required',
            'title' => 'required|string|min:1|max:255',
            'price' => 'required|numeric|min:-2147483648|max:2147483647',
            'description' => 'required|string|min:1|max:500',
            'stock' => 'required|numeric|min:-2147483648|max:2147483647',
        ];

        $data = $request->validate($rules);


        return $data;
    }

}
