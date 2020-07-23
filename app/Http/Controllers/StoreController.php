<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\CategoryStore;
use App\Models\Store;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $store = Store::with('user')->get();
        $categoryStore = CategoryStore::all();
        return view('stores.index',compact('store','categoryStore'));
    }

    public function indexStore($id)
    {
        $categoryStore = CategoryStore::all();
        $store = Store::with('user')->where('categorie_store_id',$id)->get();
        return view('stores.storeIndex',compact('categoryStore','store'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::where('role_id',2)->get();
        $store = CategoryStore::pluck('name','id')->all();
        return view('stores.create',compact('user','store'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $this->getData($request);
            Store::create($data);
//            return response()->json($data, 201);
        return redirect()->route('stores.store.index')
            ->with('success_message', 'La Tienda se agregó con éxito.');
        } catch (Exception $exception) {
            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stores = Store::findOrFail($id);
        $user = User::where('role_id',2)->get();
        $store = CategoryStore::all();
        $relation = Store::with('categorystore','user')->find($id);
        return view('stores.edit',compact('store','user','stores','relation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $this->getData($request);
            $store = Store::findOrFail($id);
            $store->update($data);
            return redirect()->route('stores.store.index')
                ->with('success_message', 'La Tienda se actualizo con éxito.');

        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $store = Store::findOrFail($id);
            $store->delete();
            return redirect()->route('stores.store.index')
                ->with('success_message', 'La Tienda se elimino con éxito.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Se produjo un error inesperado al intentar procesar su solicitud.']);
        }
    }
    protected function getData(Request $request)
    {
        $rules = [
            'user_id'=>'required',
            'categorie_store_id'=>'required',
            'name'=> 'required|min:3|max:70|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\pL\s])',
            'email'=>'required|max:50|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\pL\s])',
            'phone'=>'required|min:7|numeric',
            'description'=>'min:2',
            'lat'=>'required',
            'lng'=>'required'
        ];

        $dataStore = $request->validate($rules);
        return $dataStore;
    }
}
