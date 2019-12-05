<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Auth;

class BaseModel extends Model
{
    const ORDER_FIELD_NAME = 'order';

    const DEFAULT_ORDER = 1;

    protected $guarded = array('id', 'user_id', 'created_at', 'updated_at');

    protected $casts = array('is_active' => 'boolean');

    /**
     * @inheritDoc
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            $model->setAttribute('user_id', Auth::guard('admins')->user()->id);
        });
    }

    /**
     * Scope a query to only include active = true when not login
     *
     * @param Builder $query
     * @return $this|Builder
     */
    public function scopeActive(Builder $query)
    {
        if (!auth()->check()) {
            return $query->where('active', TRUE);
        }

        return $query;
    }

    /**
     * Default query order
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeOrdered(Builder $query)
    {
        return $query->orderBy(self::ORDER_FIELD_NAME)->orderByDesc('id');
    }

    /**
     * Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    /**
     * Accessor
     *
     * @param $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    /**
     * Accessor
     *
     * @param $value
     * @return string
     */
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    /**
     * Accessor
     *
     * @return string
     */
    public function getIsDraftHtmlAttribute()
    {
        if ($this->is_active === FALSE) {
            return '<i class="mdi-toggle-check-box green-text"></i>';
        }

        return '';
    }

    public function getImage($size = 'small')
    {
        if ($this->getAttributeValue('resource_id') === NULL) {
            return Resource::NO_SRC;
        }

        return $this->getRelationValue('resource')->getAttribute($size);
    }
}
