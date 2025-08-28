<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $fillable = [
        'donor_id',
        'campaign_id',
        'amount',
        'transaction_id',
        'receipt_no',
        'donation_date',
        'message',
        'payment_method_id',
        'donation_source_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    // In the Donation model (App\Models\Donation.php)
public function createdBy()
{
    return $this->belongsTo(User::class, 'user_id'); // assuming the foreign key is 'user_id'
}

    public function donor() {return $this->belongsTo(Donor::class,'donor_id');}
    public function campaign() {return $this->belongsTo(Campaign::class,'campaign_id');}

    public function source()
     {
        return $this->belongsTo(DonationSource::class,'donation_source_id');
    }

    public function paymentmethod()
    {
       return $this->belongsTo(PaymentMethod::class,'payment_method_id');
   }

}
