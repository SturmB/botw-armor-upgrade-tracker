<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property string $created_at
 * @property string $updated_at
 */
class Resource extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = "integer";

    /**
     * @var array
     */
    protected $fillable = ["name", "image", "created_at", "updated_at"];

    /**
     * @return BelongsToMany
     */
    public function armors(): BelongsToMany
    {
        return $this->belongsToMany(Armor::class);
    }

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
