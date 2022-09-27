<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdCategory extends Model
{
    use HasFactory;
    protected $guarded;

    public function ads()
    {
        return $this->hasMany(Ad::class, 'category_id');
    }

    public function subCategories()
    {
        return $this->hasMany(AdSubCategory::class);
    }

    public function attacheds()
    {
        return $this->hasMany(AdAttached::class);
    }

    public function writeAttachments()
    {
        return $this->hasMany(AdWriteAttachment::class, 'ad_write_attachment_id');
    }
}
