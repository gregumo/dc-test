<?php

namespace App\Api\Transformers;

/**
 * @author Grégoire Humeau <gregoire.humeau@gmail.com>
 */
interface DataTransformerInterface
{
    /**
     * @param $data
     *
     * @return mixed
     */
    public function transformDataToModel($data);

}