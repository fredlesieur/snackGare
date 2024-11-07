<?php

namespace App\Models;

class SectionModel extends Model
{
    protected $table = 'sections';

    public function findByPageId(int $pageId)
    {
        return $this->findBy(['page_id' => $pageId]);
    }
}
