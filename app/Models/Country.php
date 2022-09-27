<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $guarded;

    public static function getAdsCountry($countryQuery)
    {
//        return $this->getChild($this);
        return $countryQuery->with('cities.ads');
    }

    public function getAdsCount()
    {
        $this->attributes['ads_count'] = count($this->getChild($this));
        return $this->attributes['ads_count'];
    }

    public function getChild($country)
    {
        $ads = [];
        foreach ($country->cities as $key => $city)
        {
            foreach ($city->ads as $ad)
            {
                $ads[] = $ad;
            }
        }
        return $ads;
    }

    public function cities()
    {
        return $this->hasMany(AdCity::class);
    }
}
