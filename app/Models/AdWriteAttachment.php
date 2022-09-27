<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdWriteAttachment extends Model
{
    use HasFactory;
    protected $guarded;

    public function category()
    {
        return $this->belongsTo(AdCategory::class, 'ad_category_id');
    }

    public function ads()
    {
        return $this->belongsToMany(Ad::class, 'pivot_ad_write_attachments', 'ad_id', 'ad_write_attachment_id');
    }
}
