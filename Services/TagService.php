<?php
/**
 * @author	 : Vishal Kumar Sinha <vishalsinhadev@gmail.com>
 */
namespace Modules\Blog\Services;

use Modules\Blog\Entities\Tag;

/**
 *
 * @author Sinha
 *        
 */
class TagService
{

    public function list($offset = 0, $query = null)
    {
        return Tag::search($query)->take(20)->skip($offset)->paginate(10);
    }
}

