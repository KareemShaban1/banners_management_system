<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class CashOut extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cash_outs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['receipt_number','supplier_id','user_id','date','paid_amount','description'];

    protected static function booted()
    {


        static::creating(function (CashOut $cashOut) {
            // Check for the next available receipt_number
            $nextReceiptNumber = CashOut::getNextOrderNumber();

            // Find a CashOut with the given receipt_number (deleted or not)
            $deletedCashOut = CashOut::where('receipt_number', $nextReceiptNumber)
            ->where('deleted_at', '<>', null)->first();

            // If an existing CashOut is found (deleted or not), increment the receipt_number
            if ($deletedCashOut) {
                $cashOut->receipt_number = $nextReceiptNumber + 1;
            } else {
                $cashOut->receipt_number = $nextReceiptNumber;
            }

            // Set other properties
            $cashOut->user_id = Auth::user()->id;
        });
    }


    public static function getNextOrderNumber()
    {
        // SELECT MAX(number) FROM cash outs
        $year = Carbon::now()->year;
        $receipt_number = CashOut::whereYear('created_at', $year)->max('receipt_number');

        // if there is number in this year add 1 to this number
        if ($receipt_number) {
            return $receipt_number + 1;
        }
        // if not return 0001
        return $year . '0001';
    }


    public function user()
    {

        return $this->belongsTo(User::class);
    }
    public function supplier()
    {

        return $this->belongsTo(Supplier::class);
    }

}