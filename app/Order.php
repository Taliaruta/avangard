<?php

namespace App;

use App\Notifications\OrderNotification;
use App\Partner;
use Illuminate\Database\Eloquent\Model;
use Notification;

class Order extends Model
{
    /*
    |-------------------------------------------------------------------------- 
    | GLOBAL VARIABLES 
    |-------------------------------------------------------------------------- 
    */

    public $statuses = [
        '0' => 'новый',
        '10' => 'подтвержден',
        '20' => 'завершен',
    ];

    protected $table = 'orders';

    protected $fillable = [
        'client_email',
        'partner_id',
        'status',
    ];

    protected $appends = [
        'status_name',
    ];
    
    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function notifyPartners() {
        $partners = $this->products->unique('vendor_id')->pluck('vendor_id');
        $mails = Partner::find($partners)->pluck('email')->toArray();

        $mails[] = $this->client_email;

        foreach($mails as $mail) {
            Notification::route('mail', $mail)->notify(new OrderNotification($this));
        }
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function partner() {
        return $this->belongsTo('App\Partner');
    }

    public function products() {
        return $this->belongsToMany('App\Product', 'order_products', 'order_id', 'product_id')->withPivot('quantity', 'price');
    }
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */
    
    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */
    
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function getStatusNameAttribute() {
        return $this->statuses[$this->status] ?? 'не определён';
    }

    public function getPriceAttribute() {
        $total_price = 0;

        if($this->products->count() > 0) {
            foreach($this->products as $product) {
                $total_price += (int) $product->pivot->price * (int) $product->pivot->quantity;
            }
        }

        return $total_price;
    }
}
