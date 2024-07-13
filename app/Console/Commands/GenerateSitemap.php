<?php
namespace App\Console\Commands;

use App\Models\Activity;
use App\Models\Mall;
use App\Models\TransInfo;
use App\Models\TransPost;
use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\TransPlace;

class GenerateSitemap extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

            $sitemap = Sitemap::create();

            $sitemap
                ->add(Url::create('/'))
                ->add(Url::create('/shopping'))
                ->add(Url::create('/places'))
                ->add(Url::create('/activity'))
                ->add(Url::create('/info'));

            Mall::all()->each(function (Mall $mall) use ($sitemap) {
                $sitemap->add(Url::create("/shopping/{$mall->slug}"));
            });

            TransPlace::where('lang_id', 1)->each(function (TransPlace $place) use ($sitemap) {
                $sitemap->add(Url::create("/places/{$place->slug}"));
            });

            Activity::all()->each(function (Activity $activity) use ($sitemap) {
                $sitemap->add(Url::create("/activity/{$activity->slug_sk}"));
            });

            // Iterate through TransPost entries and add URLs to the sitemap
            TransPost::where('lang_id', 1)->each(function (TransPost $post) use ($sitemap) {
                // Assuming 'activities' is the slug or identifier you need
                $activitySlug = $post->origin->activities[0]->slug_sk ?? null; // Ensure you have a valid slug
                if ($activitySlug) {
                    $sitemap->add(Url::create("/activity/{$activitySlug}/{$post->slug}"));
                }
            });

            TransInfo::where('lang_id', 1)->each(function (TransInfo $info) use ($sitemap) {
                $sitemap->add(Url::create("/info/{$info->slug}"));
            });


            $sitemap->writeToFile('/home/rakusko.sk/web/sitemap.xml');
    }
}