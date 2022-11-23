<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use App\Models\Brand;
use Illuminate\Http\Request;

class BeersController extends Controller
{
    public function read($id = null) {
        if(isset($id)) {
            $beer = Beer::findOrFail($id);

            return view("beer", [
                "beer" => $beer
            ]);
        }


        $beers = Beer::all();
        $brands = Brand::all();

        return view("beers", [
            "beers" => $beers,
            "brands" => $brands
        ]);
    }

    public function create(Request $request) {
        $request->validate([
            "name" => ["required", "string"],
            "price" => ["required", "numeric", "min:1"],
            "type" => ["required", "string"],
            "brand" => ["required", "exists:brands,id"]
        ]);

        $brand = Brand::find($request->brand);
        $brand->beers()->create([
            "name" => $request->name,
            "price" => $request->price,
            "type" => $request->type
        ]);

        return redirect("/beer");
    }

    public function delete($id) {
        $beer = Beer::findOrFail($id);
        $beer->bars()->detach();
        $beer->delete();

        return redirect()->back();
    }

    public function showUpdate($id) {
        $beer = Beer::findOrFail($id);
        $brands = Brand::all();

        return view("beer_update", [
            "beer" => $beer,
            "brands" => $brands
        ]);
    }

    public function update(Request $request, $id) {
        $beer = Beer::findOrFail($id);

        $request->validate([
            "name" => ["required", "string"],
            "price" => ["required", "numeric", "min:1"],
            "type" => ["required", "string"],
            "brand" => ["required", "exists:brands,id"]
        ]);

        $brand = Brand::find($request->brand);

        $beer->brand()->associate($brand);

        $beer->update([
            "name" => $request->name,
            "price" => $request->price,
            "type" => $request->type
        ]);

        return redirect("/beer/{$id}");
    }
}
