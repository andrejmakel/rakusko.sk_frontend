<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use App\Models\Holiday;
use Artesaos\SEOTools\Facades\OpenGraph;
use Carbon\Carbon;
use Artesaos\SEOTools\Facades\SEOMeta;

class HomeController extends Controller
{

    public function index()
    {
        $carousels = Carousel::where('lang_id', trans('frontend.langId'))->get();
        $currentDate = Carbon::now();
        $endDate = $currentDate->copy()->addDays(3)->endOfDay();
        $holidays = Holiday::whereBetween('date', [$currentDate, $endDate])
            ->get(); 

        OpenGraph::addImage($carousels[0]->cover_img->getUrl());

        return view('frontend.home.index', compact('carousels', 'holidays'));
    }





}
