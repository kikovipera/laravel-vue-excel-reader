<?php

namespace App\Http\Controllers\Stores;

use App\Imports\StoresImport;
use App\Models\Store;
use App\Http\Controllers\Controller;
use App\Http\Requests\Stores\StoreExcel;
use App\Repositories\StoresRepository;


use Excel;

class StoreController extends Controller
{
    private $repository;

    public function __construct(Store $products)
    {
        $this->repository = new StoresRepository($products);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = $this->repository->all();

       return response()->json($data,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(StoreExcel $request)
    {
      $import =  Excel::import(new StoresImport(), $request->file('file'));
      if($import){
          $data = $this->repository->all();

          return response()->json($data,200);
      }
        return response()->json(['error'=> 'Upload unsuccessful'],422);
    }


}
