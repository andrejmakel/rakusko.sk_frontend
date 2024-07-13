<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCategoryRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Info;
use App\Models\Sidebar;
use App\Models\TransInfo;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOTools;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Str;

class InfoController extends Controller
{
    public function index()
    {
        $transInfos = TransInfo::where("lang_id", trans('frontend.langId'))
            ->orderByRaw('`order` IS NULL, `order`')
            ->get();

        SEOTools::setTitle('Informácie');
        OpenGraph::addImage("/img/info.jpg");

        return view('frontend.info.index', compact('transInfos'));
    }

    public function show($slug)
    {
        $transInfo=TransInfo::whereSlug($slug)->firstOrFail();
        $infos = $transInfo->origin;
        $sidebars = Sidebar::where('lang_id', trans('frontend.langId'))->orderByRaw('`order` IS NULL, `order`')->get();
        $ads = $infos->ads()->where("lang_id", trans('frontend.langId'))->orderByRaw('`order` IS NULL, `order`')->get();

        $description = strip_tags($transInfo->text); 
        $description = Str::limit($description, 160); 
        SEOTools::setTitle($transInfo->title);
        SEOTools::setDescription($description);
        OpenGraph::addImage($infos->cover_img[0]->getUrl());

        return view('frontend.info.show', compact('infos', 'sidebars', 'ads'));
    }



}
