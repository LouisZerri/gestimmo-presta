<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'content',
        'original_content',
        'rating',
        'page',
        'is_published',
        'sort_order',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'rating' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saved(fn () => Cache::forget('home_testimonials') || Cache::forget('sell_testimonials') || Cache::forget('manage_testimonials'));
        static::deleted(fn () => Cache::forget('home_testimonials') || Cache::forget('sell_testimonials') || Cache::forget('manage_testimonials'));
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)->orderBy('sort_order');
    }

    public function scopeForPage($query, string $page)
    {
        return $query->where('page', $page);
    }

    public function getInitialsAttribute(): string
    {
        $parts = explode(' ', $this->name);
        $initials = '';
        foreach ($parts as $part) {
            $initials .= mb_strtoupper(mb_substr(trim($part), 0, 1));
        }
        return mb_substr($initials, 0, 2);
    }
}
