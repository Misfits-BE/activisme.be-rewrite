<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\AuthorRelation;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * Class Category 
 * ---- 
 * Database model for the categories. 
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 * @package     App\Models
 */
class Category extends Model
{
    use AuthorRelation, HasSlug;
    
    /**
     * Mass-assign fields for the database table. 
     * 
     * @var array
     */
    protected $fillable = ['author_id', 'name', 'description'];

    /**
     * Function for generating slug from the category name.
     * @return SlugOptions
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
