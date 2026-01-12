<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->get('type');
        $page = null;

        if ($type) {
            $page = Page::where('type', $type)->first();
        }

        return view('admin.pages.index', compact('type', 'page'));
    }

    public function update(Request $request, $type)
    {
        $request->validate([
            'pagename' => 'required',
            'pagename_ar' => 'nullable',
            'pgedetails' => 'required',
            'pgedetails_ar' => 'nullable',
        ]);

        Page::updateOrCreate(
            ['type' => $type],
            [
                'PageName' => $request->pagename,
                'PageName_ar' => $request->pagename_ar,
                'detail' => $request->pgedetails,
                'detail_ar' => $request->pgedetails_ar,
            ]
        );

        return redirect()->route('admin.pages', ['type' => $type])->with('success', 'Page data updated successfully');
    }
}