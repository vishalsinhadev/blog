<?php
/**
 * @author	 : Vishal Kumar Sinha <vishalsinhadev@gmail.com>
 */
namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SearchableTrait;
use Modules\Blog\Traits\BlogBaseModel;

class Tag extends Model
{
    use BlogBaseModel;
    use SearchableTrait;

    protected $fillable = [
        'name'
    ];
}
