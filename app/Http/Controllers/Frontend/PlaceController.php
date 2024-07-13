<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\Sidebar;
use App\Models\TransPlace;
use App\Models\Tag;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Str;

class PlaceController extends Controller
{
    public function index()
    {
        $transPlaces = TransPlace::where("lang_id", trans('frontend.langId'))
            ->orderByRaw('`order` IS NULL, `order`')
            ->get();
        $tags = Tag::all();

        SEOTools::setTitle('Miesta');
        OpenGraph::addImage('/img/places.jpg');

        return view('frontend.places.index', compact('transPlaces', 'tags'));
    }

    public function show($slug)
    {
        
        $transPlace = TransPlace::whereSlug($slug)
        ->firstOrFail();
        
        $places = $transPlace->origin;

        $sidebars = Sidebar::where('lang_id', trans('frontend.langId'))->orderByRaw('`order` IS NULL, `order`')->get();

        $ads = $places->ads()->where("lang_id", trans('frontend.langId'))->orderByRaw('`order` IS NULL, `order`')->get();

        $description = strip_tags($transPlace->text);
        $description = Str::limit($description, 160);
        SEOTools::setTitle($transPlace->title);
        SEOTools::setDescription($description);
        OpenGraph::addImage($places->cover_img[0]->getUrl());
        
        return view('frontend.places.show', compact('places', 'sidebars', 'ads'));
    }

    public function kupon(Request $request)
    {
        $location = Location::get($request->ip());
        if ($location){
            if ($location->countryCode == "AT"){
                return abort(403, 'this page is restricted in austria');
            } 
        }
        
        $places = Place::all();
        return view('frontend.kupon.kupon', compact('places'));
    }

    public function filter(Request $request)
    {

        $tags = Tag::all();
        $tagsIds = $request->input('tags', []);
        $query = Place::query();

        

        foreach ($tagsIds as $tagId) {
            $query->whereHas('tags', function ($query) use ($tagId) {
                $query->where('id', $tagId);
            });
        }
    
        $places = $query->get();

        // Get all transPlaces for the filtered places where lang_id is 1
        $transPlaces = TransPlace::whereIn('origin_id', $places->pluck('id'))
            ->where('lang_id', trans('frontend.langId'))
            ->orderByRaw('`order` IS NULL, `order`')
            ->get();

        $sidebars = Sidebar::where('lang_id', trans('frontend.langId'))->orderByRaw('`order` IS NULL, `order`')->get();

        SEOTools::setTitle('Miesta');
        OpenGraph::addImage('/img/places.jpg');

        //$ads = $places->ads()->where("lang_id", trans('frontend.langId'))->orderByRaw('`order` IS NULL, `order`')->get();
        return view('frontend.places.index', compact('transPlaces', 'tags', 'sidebars', /* 'ads' */));
    }

}
