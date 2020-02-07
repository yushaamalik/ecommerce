<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{
    use SearchableTrait, Searchable;

    protected $fillable = ['quantity'];

    /**
     * Searchable rules.
     *
     * @var array
     */
    
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
     

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    

    public function presentPrice()
    {
        return sprintf('$%i', $this->price / 100);
    }

    public function scopeMightAlsoLike($query)
    {
        return $query->inRandomOrder()->take(4);
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
  


}
