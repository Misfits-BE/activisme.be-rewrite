<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\AuthorRelation;

/**
 * Class Contact 
 * ---- 
 * Database model for the contacts. 
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 * @package     App\Models 
 */
class Contact extends Model
{
    use AuthorRelation;
    
    /**
     * Mass-assign fields for the database table. 
     * 
     * @var array
     */
    protected $fillable = ['author_id', 'is_public', 'name', 'email', 'phone_number', 'organisation'];
}
