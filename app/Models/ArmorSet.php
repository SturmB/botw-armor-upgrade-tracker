<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property string $created_at
 * @property string $updated_at
 * @property Armor[] $armors
 */
class ArmorSet extends Model
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
     * @return HasMany
     */
    public function armors(): HasMany
    {
        return $this->hasMany(Armor::class);
    }
}
