<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Mall;
use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\ShopCategory;
use App\Models\Sidebar;
use App\Models\TransMall;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Str;


class MallController extends Controller
{
    public function index()
    {
        $transMalls = TransMall::where("lang_id", trans('frontend.langId'))
            ->orderByRaw('`order` IS NULL, `order`')
            ->get();

        SEOTools::setTitle('Nákupy');
        OpenGraph::addImage("/img/shopping.jpg");

        return view('frontend.shopping.index', compact('transMalls'));
    }

    public function show($slug)
    {

        $malls = Mall::whereSlug($slug)->firstOrFail();
        $categoryName = request('tag');
        $category = ShopCategory::where('title_sk', $categoryName)->first();
        $categoryId = $category ? $category->id : null;
        if ($categoryId) {
            $shops = Shop::whereHas('categories', function ($query) use ($categoryId) {
                $query->where('id', $categoryId);
            })->where('mall_id', $malls->id)
            ->orderBy('title')
            ->get();
        } else {
            $shops = Shop::where('mall_id', $malls->id)
                ->orderBy('title')
                ->get();
        }
        
        $mallId = $malls->id;
        $categories = ShopCategory::whereHas('shops', function ($query) use ($mallId) {
            $query->where('mall_id', $mallId);
        })->get();
        $sidebars = Sidebar::where('lang_id', trans('frontend.langId'))->orderByRaw('`order` IS NULL, `order`')->get();
        $ads = $malls->ads()->where("lang_id", trans('frontend.langId'))->orderByRaw('`order` IS NULL, `order`')->get();

        $description = strip_tags($malls->originTransMalls[trans('frontend.langOrder')]->text); 
        $description = Str::limit($description, 160); 
        SEOTools::setDescription($description);
        SEOTools::setTitle($malls->title);
        OpenGraph::addImage($malls->cover_img[0]->getUrl());
        
        return view('frontend.shopping.show', compact('malls', 'categories', 'shops', 'categoryName', 'sidebars', 'ads'));
    }

    public function shop($slugMall,$slugShop)
    {   
        $mall = Mall::whereSlug($slugMall)
        ->firstOrFail();
        
        $shops = Shop::where('slug', $slugShop)->where('mall_id', $mall->id)
                        ->firstOrFail();

        $description = strip_tags($shops->originTransShops->where('lang_id', trans('frontend.langId'))->pluck('text')->first());
        $description = Str::limit($description, 160);
        SEOTools::setTitle($shops->title);
        SEOTools::setDescription($description);
        OpenGraph::addImage($shops->logo->getUrl());
        return view('frontend.shopping.shop', compact('shops'));
    }

}
