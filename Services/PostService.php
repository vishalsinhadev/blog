<?php
/**
 * @author	 : Vishal Kumar Sinha <vishalsinhadev@gmail.com>
 */
namespace Modules\Blog\Services;

use Modules\Blog\Entities\Post;

/**
 *
 * @author Sinha
 *        
 */
class PostService
{

    public function postList($offset = 0, $query = null)
    {
        return Post::search($query)->take(20)
            ->skip($offset)
            ->paginate(10);
    }

    public function getDataBySlug($slug)
    {
        return Post::whereSlug($slug)->paginate(1);
    }
}

