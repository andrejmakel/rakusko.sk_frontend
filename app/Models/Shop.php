<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Shop extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    public $table = 'shops';

    public static $searchable = [
        'title',
    ];

    protected $appends = [
        'logo',
        'gallery',
        'map_img',
    ];

    protected $dates = [
        'update',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'title',
        'slug',
        'discount',
        'text',
        'kontakt',
        'zip',
        'link',
        'update',
        'mall_id',
        'created_at',
        'updated_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function originTransShops()
    {
        return $this->hasMany(TransShop::class, 'origin_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(ShopCategory::class);
    }

    public function getLogoAttribute()
    {
        $file = $this->getMedia('logo')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function openings()
    {
        return $this->belongsToMany(Opening::class);
    }


    public function getGalleryAttribute()
    {
        $files = $this->getMedia('gallery');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }

    public function getMapImgAttribute()
    {
        $file = $this->getMedia('map_img')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getUpdateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setUpdateAttribute($value)
    {
        $this->attributes['update'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function mall()
    {
        return $this->belongsTo(Mall::class, 'mall_id');
    }
}
