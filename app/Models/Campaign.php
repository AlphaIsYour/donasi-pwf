<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Campaign extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'category_id', 'target_donation', 'max_date', 'description', 'image', 'user_id',
    ];

    /**
     * category
     *
     * @return void
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * user
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * donations
     *
     * @return void
     */
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    /**
     * sumDonation
     *
     * @return void
     */
    public function sumDonation() 
    {
        return $this->hasMany(Donation::class)->selectRaw('donations.campaign_id,SUM(donations.amount) as total')->where('donations.status', 'success')->groupBy('donations.campaign_id');
    }

    /**
     * image
     *
     * @return Attribute
     */
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset('/storage/campaigns/' . $value),
        );
    }


}
