<?php

namespace App\Models\Publications\Articles\Journal;

use Illuminate\Database\Eloquent\Model;
use App\Models\Publications\Articles\Article;

class Journal extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'issn',
        'country',
        'category',
        'journal_type_id',
    ];

    /**
     * Get the MoviePoster that owns the Journal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function journalType()
    {
        return $this->belongsTo(JournalType::class);
    }

    /**
     * Get the Articles for the Journal
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
