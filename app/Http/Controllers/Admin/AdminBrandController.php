<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class AdminBrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    if (Brand::where('BrandName', $value)->exists()) {
                        $fail('The brand name has already been taken.');
                    }
                },
            ],
            'brand_ar' => 'nullable|string|max:255',
        ]);

        Brand::create([
            'BrandName' => $request->brand,
            'BrandName_ar' => $request->brand_ar,
            'CreationDate' => now(),
        ]);

        return redirect()->route('admin.brands')->with('success', 'Brand created successfully');
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'brand' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) use ($id) {
                    if (Brand::where('BrandName', $value)->where('id', '!=', $id)->exists()) {
                        $fail('The brand name has already been taken.');
                    }
                },
            ],
            'brand_ar' => 'nullable|string|max:255',
        ]);

        $brand = Brand::findOrFail($id);
        $brand->update([
            'BrandName' => $request->brand,
            'BrandName_ar' => $request->brand_ar,
            'UpdationDate' => now(),
        ]);

        return redirect()->route('admin.brands')->with('success', 'Brand updated successfully');
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);

        // Check if brand is being used by any vehicles
        if ($brand->vehicles()->exists()) {
            return redirect()->route('admin.brands')
                ->with('error', 'Cannot delete brand. It is being used by one or more vehicles.');
        }

        $brand->delete();

        return redirect()->route('admin.brands')->with('success', 'Brand deleted successfully');
    }
}