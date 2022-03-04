<?php

namespace App\Models;

use App\Enums\TaskState;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Laravel\Scout\Searchable;

class Task extends Model
{
    use HasFactory, Searchable;

    protected $casts = [
        'state' => TaskState::class
    ];

    protected $appends = [
        'path'
    ];

    public function path(): Attribute
    {
        return Attribute::get(fn() => route('task.show', $this));
    }


    /**
     * Old ways attribute
     *
     * @return  [type]  [return description]
     */
    // public function getPathAttribute()
    // {
    //     return route('task.show', $this);
    // }

    #[SearchUsingFullText('detail')]
    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'detail' => $this->detail
        ];
    }
}
