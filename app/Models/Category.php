<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\AuthorRelation;

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
    // AuthorRelation = BelongsToRelation for the creator user data.
    use AuthorRelation;
    
    /**
     * Mass-assign fields for the database table. 
     * 
     * @var array
     */
    protected $fillable = ['author_id', 'name', 'description'];
}
