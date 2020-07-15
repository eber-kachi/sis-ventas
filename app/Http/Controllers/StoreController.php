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
        $store = DB::table('users')
            ->join('stores','users.id','=','stores.user_id')
            ->select('stores.name as name','users.name as user','stores.phone as phone','stores.id as id')
            ->where('users.role_id',2)->get();
        $categoryStore = CategoryStore::all();
        return view('stores.index',compact('store','categoryStore'));
    }

    public function indexStore($id)
    {
        $categoryStore = CategoryStore::all();
        $store = DB::table('users')
            ->join('stores','users.id','=','stores.user_id')
            ->select('stores.name as name','users.name as user','stores.phone as phone','stores.id as id')
            ->where([
                'users.role_id'=>2,
                'stores.categorie_store_id'=>$id
            ])->get();

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
//        $user = User::whereBetween('role_id',array(2,3))->get();
        $store = CategoryStore::all();
        return view('stores.create',compact('user','store'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $stores = new Store();
        $stores->user_id = $request->user_id;
        $stores->categorie_store_id = $request->categorie_store_id;
        $stores->name = ucwords($request->name);
        $stores->location = ucwords($request->location);
        $stores->email = $request->email;
        $stores->phone = $request->phone;
        $stores->description = $request->description;
        $stores->save();

//        $user = User::findOrFail($stores->user_id);
//        $user->role_id = 2;
//        $user->save();

        return redirect()->route('stores.store.index')
            ->with('success_message', 'La Tienda se agregó con éxito.');

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

        $relation = DB::table('categories_store')
            ->join('stores','categories_store.id','=','stores.categorie_store_id')
            ->join('users','stores.user_id','=','users.id')
            ->select('users.id as user_id','users.name as name','categories_store.id as categorie_store_id','categories_store.name as category')
            ->where('stores.id',$id)->get();

        return view('stores.edit',compact('store','user','stores','relation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, $id)
    {
        $stores = Store::findorFail($id);
        $stores->user_id = $request->user_id;
        $stores->categorie_store_id = $request->categorie_store_id;
        $stores->name = ucwords($request->name);
        $stores->location = ucwords($request->location);
        $stores->email = $request->email;
        $stores->phone = $request->phone;
        $stores->description = $request->description;
        $stores->save();

        return redirect()->route('stores.store.index')
            ->with('success_message', 'La Tienda se actualizo con éxito.');

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
//            $user = User::findOrFail($store->user_id);
//            $user->role_id = 3;
//            $user->save();
            $store->delete();
            return redirect()->route('stores.store.index')
                ->with('success_message', 'La Tienda se elimino con éxito.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Se produjo un error inesperado al intentar procesar su solicitud.']);
        }
    }
}
