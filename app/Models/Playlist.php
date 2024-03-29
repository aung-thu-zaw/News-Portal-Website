<?php

namespace App\Models;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Playlist extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasSlug;

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function reelVideos(): BelongsToMany
    {
        return $this->belongsToMany(ReelVideo::class,'playlist_reel_video');
    }

    public static function getForm(): array
    {
        return [
            Section::make()->schema([
                TextInput::make('title')
                       ->string()
                       ->required()
                       ->maxLength(255),

                Textarea::make('description')
                       ->string()
                       ->required(),
            ])
        ];
    }
}
