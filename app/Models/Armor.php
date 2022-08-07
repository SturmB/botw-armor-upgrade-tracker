<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property integer $id
 * @property integer $armor_set_id
 * @property string $name
 * @property string $image
 * @property boolean $upgradable
 * @property string $created_at
 * @property string $updated_at
 * @property ArmorSet $armorSet
 */
class Armor extends Model
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
    protected $fillable = [
        "armor_set_id",
        "name",
        "image",
        "upgradable",
        "created_at",
        "updated_at",
    ];

    /**
     * @return BelongsToMany
     */
    public function resources(): BelongsToMany
    {
        return $this->belongsToMany(Resource::class);
    }

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function armorSet(): BelongsTo
    {
        return $this->belongsTo(ArmorSet::class);
    }
}
