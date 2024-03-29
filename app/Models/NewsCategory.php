<?php

namespace App\Models;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class NewsCategory extends Model
{
    use HasFactory;
    use HasSlug;
    use SoftDeletes;

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
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

    public function newsSubcategories(): HasMany
    {
        return $this->hasMany(NewsSubcategory::class);
    }

    public static function getForm(): array
    {
        return [
            Section::make()->schema([
                TextInput::make('name')
                    ->required()
                    ->string()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                Select::make('status')->options([
                    true => 'Show',
                    false => 'Hide',
                ]),
            ]),
        ];
    }
}
