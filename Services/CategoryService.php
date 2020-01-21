<?php
/**
 * @author	 : Vishal Kumar Sinha <vishalsinhadev@gmail.com>
 */
namespace Modules\Blog\Services;

use Modules\Blog\Entities\Category;

/**
 *
 * @author Sinha
 *        
 */
class CategoryService
{

    public function list($offset = 0, $query = null)
    {
        return Category::search($query)->take(20)->skip($offset)->paginate(10);
    }
}

