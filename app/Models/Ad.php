<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $guarded;

    public function subCategories()
    {
        return $this->belongsTo(AdSubCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function city()
    {
        return $this->belongsTo(AdCity::class);
    }

    public function category()
    {
        return $this->belongsTo(AdCategory::class, 'category_id');
    }


    public function photos()
    {
        return $this->hasMany(AdPhoto::class);
    }

    public function specifications()
    {
        return $this->hasMany(AdSpecification::class);
    }

    public function agent()
    {
        return $this->belongsTo(AdAgent::class, 'ad_agent_id');
    }

    public function attachments()
    {
        return $this->belongsToMany(AdAttached::class, 'pivot_ad_attacheds', 'ad_id', 'ad_attached_id');
    }
    public function hasAttach($attachId)
    {
        return in_array($attachId, $this->attachments->pluck('id')->toArray());
    }

    public function chart()
    {
        return $this->hasOne(Chart::class);
    }

    public function writeAttachments()
    {
        return $this->belongsToMany(AdWriteAttachment::class, 'pivot_ad_write_attachments', 'ad_id', 'ad_write_attachment_id')->withPivot('body');
    }

    public function hasWAttach($attachId)
    {
        return in_array($attachId, $this->writeAttachments->pluck('id')->toArray());
    }
}
