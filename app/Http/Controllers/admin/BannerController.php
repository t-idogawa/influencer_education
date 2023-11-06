<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Http\Requests\BannerRequest;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.admin_banners_show_list', compact('banners'));
    }

    public function store(BannerRequest $request)
    {
        try {
            $banner = new Banner();
            $banner->registBanner($request);
            return back();
        } catch (\Exception $e) {
            return back();
        }
    }

    public function destroy($id)
    {
        try {
            $banner = new Banner();
            $banner->deleteBanner($id);
            return back();
        } catch (\Exception $e) {
            return back();
        }
    }
}
