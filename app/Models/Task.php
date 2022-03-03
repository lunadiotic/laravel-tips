<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Laravel\Scout\Searchable;

class Task extends Model
{
    use HasFactory, Searchable;

    #[SearchUsingFullText('detail')]
    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'detail' => $this->detail
        ];
    }
}
