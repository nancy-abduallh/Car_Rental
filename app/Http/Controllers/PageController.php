<?php
namespace App\Http\Controllers;

use App\Models\Page;

class PageController extends Controller
{
    public function show($type)
    {
        $page = Page::where('type', $type)->firstOrFail();
        return view('pages.page', compact('page'));
    }
}
