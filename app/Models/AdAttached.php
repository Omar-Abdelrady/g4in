<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdAttached extends Model
{
    use HasFactory;
    protected $guarded;

    public function category()
    {
        return $this->belongsTo(AdCategory::class, 'ad_category_id');
    }
    public function ads()
    {
        return $this->belongsToMany(Ad::class, 'pivot_ad_attacheds', 'ad_id', 'ad_attached_id');
    }
}
