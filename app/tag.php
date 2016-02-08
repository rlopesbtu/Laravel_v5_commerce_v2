<?php namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class tag extends Model {

    protected $fillable = [
        'name'
    ];

	public function products()
    {
        return $this->belongsToMany('CodeCommerce\Product');
    }

}
