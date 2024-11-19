<?php

namespace App\Models;

class HoraireModel extends Model
{
    protected $table = 'horaires';

    public function findByPageId(int $pageId)
    {
        return $this->findBy(['page_id' => $pageId]);
    }
}
