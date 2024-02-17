<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class ReceiveCash extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'receive_cashes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['receipt_number','receive_date','finish_date',
    'client_id','user_id','service_price','paid_amount','remaining_amount','description','type'];

    protected static function booted()
    {

        // while creating order make order number take the next available number
        static::creating(function (ReceiveCash $receiveCash) {
            $deleted_receiveCash = ReceiveCash::onlyTrashed()
                ->whereNotNull('deleted_at')
                ->get();

            if ($deleted_receiveCash->isNotEmpty()) {
                // If there is a deleted receipt number, use it
                $receiveCash->receipt_number = ReceiveCash::getNextOrderNumber() + 1;
            } else {
                // If not, use the next available order number
                $receiveCash->receipt_number = ReceiveCash::getNextOrderNumber();
            }

            $receiveCash->user_id = Auth::user()->id;
        });
    }

    public static function getNextOrderNumber()
    {

        $year = Carbon::now()->year;
        $receipt_number = ReceiveCash::whereYear('created_at', $year)->max('receipt_number');

        // if there is number in this year add 1 to this number
        if ($receipt_number) {
            return $receipt_number + 1;
        }
        // if not return 0001
        return $year . '0001';
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->belongsToMany(OrderItem::class, 'receive_item', 'receive_cash_id', 'item_id')
            ->withTimestamps();
    }


    public function receiveCashReminders()
    {
        return $this->hasMany(ReceiveCashReminder::class, 'receive_cash_id');
    }


}
