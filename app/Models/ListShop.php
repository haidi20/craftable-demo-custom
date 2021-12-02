<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListShop extends Model
{
    
    
    protected $fillable = [
        "name_shop",
        "address",
    
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
        "created_at",
        "updated_at",
    
    ];
    
    
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/list-shops/'.$this->getKey());
    }

    
}
