<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Armor
 *
 * @property integer $id
 * @property integer $armor_set_id
 * @property string $name
 * @property string $image
 * @property boolean $upgradable
 * @property string $created_at
 * @property string $updated_at
 * @property ArmorSet $armorSet
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Resource[] $resources
 * @property-read int|null $resources_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Armor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Armor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Armor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Armor whereArmorSetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Armor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Armor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Armor whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Armor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Armor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Armor whereUpgradable($value)
 * @mixin \Eloquent
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
