<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemCreateUpdate;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Traits\CommonTrait;

class ItemController extends Controller
{
    use CommonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getItemsData = Item::all();
        return $this->sendResponse(ItemResource::collection($getItemsData),'Item Fetch successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create( $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemCreateUpdate $request)
    {
        $input = $request->validated();
        $saveItem = Item::create($input);
        return $this->sendResponse(new ItemResource($saveItem),'Item Saved successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
