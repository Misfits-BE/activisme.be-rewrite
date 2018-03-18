<?php 

namespace App\Models\Relations;

use App\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Trait for the author relation in the model.
 * ---- 
 * Registered to a trait. Because we need te re-use the relation accross models. 
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 * @package     App\Models\Relations
 */
trait AuthorRelation 
{
    /**
     * Data relation for the author data. 
     * 
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id')
            ->withDefault(['name' => 'Onbekend']);
    }
}