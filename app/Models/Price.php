<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Price extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'prices';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['class_id','material_id','price'];

    public function class()
    {
        return $this->belongsTo(ClientClass::class, 'class_id');
    }

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id');
    }
}
