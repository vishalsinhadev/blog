<?php
/**
 * @author	 : Vishal Kumar Sinha <vishalsinhadev@gmail.com>
 */
namespace Modules\Blog\Traits;

/**
 *
 * @author Sinha
 *        
 */
trait BlogBaseModel
{

    public function contains($model)
    {
        return $this->id == $model->id;
    }
}

