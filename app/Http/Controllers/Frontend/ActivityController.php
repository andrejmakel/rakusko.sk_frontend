<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\TransPost;
use App\Models\Sidebar;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Str;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::orderByRaw('`order` IS NULL, `order`')->get();

        SEOTools::setTitle(trans('frontend.activity'));
        OpenGraph::addImage("/img/activity.jpg");

        return view('frontend.aktivity.index', compact('activities'));
    }

     public function show($slug)
    {
        $changeLanguage = request()->query('change_language');
        if($changeLanguage !== null){
            $activity = Activity::where(function ($query) use ($slug) {
                $query->where('slug_sk', $slug)
                    ->orWhere('slug_cs', $slug)
                    ->orWhere('slug_de', $slug)
                    ->orWhere('slug_hu', $slug)
                    ->orWhere('slug_sl', $slug);
            })
            ->firstOrFail();
        }else{
            $activity = Activity::where('slug_'.trans('frontend.langShortcut'), $slug)
            ->firstOrFail(); 
        }

        // get posts of current activity
        $posts = $activity -> activityPosts;

        // create empty array for transPost ids
        $transPostIds = [];

        // get transPosts related to posts with current lang_id and save their ID to the array
        foreach ($posts as $post) {
            $transPostIdsToSave = $post->originTransPosts
                ->where('lang_id', trans('frontend.langId'))
                ->pluck('id')
                ->toArray();
            if (!empty($transPostIdsToSave)) {
                $transPostIds = array_merge($transPostIds, $transPostIdsToSave);
            }
        }

        // load collection of transPost based on ther IDs and sort them
        $transPosts = TransPost::whereIn('id', $transPostIds)
                        ->orderByRaw('`order` IS NULL, `order`')
                        ->get();
        $title='title_'.trans('frontend.langShortcut');

        SEOTools::setTitle($activity->$title);
        OpenGraph::addImage($activity->cover_img[0]->getUrl());
        return view('frontend.aktivity.show', compact('activity', 'slug', 'transPosts'));
    } 
    public function post($slugActivity, $slugPost)
    {
        $sidebars = Sidebar::where('lang_id', trans('frontend.langId'))->orderByRaw('`order` IS NULL, `order`')->get();
        $transPost = TransPost::whereSlug($slugPost)->firstOrFail();
        $posts = $transPost->origin;
        $ads = $posts->ads()->where("lang_id", trans('frontend.langId'))->orderByRaw('`order` IS NULL, `order`')->get();

        $description = strip_tags($transPost->text);
        $description = Str::limit($description, 160); 
        SEOTools::setTitle($transPost->title);
        SEOTools::setDescription($description);
        OpenGraph::addImage($posts->cover_img[0]->getUrl());

        return view('frontend.aktivity.post', compact('posts', 'sidebars', 'ads', 'slugActivity'));
    }



}
