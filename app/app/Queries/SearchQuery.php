<?php

namespace App\Queries;

use App\Models\Note;

class SearchQuery
{
  public static function execute(string $keyword)
  {
    return Note::whereHas('pages', function ($query) use ($keyword) {
      $query->where('page_title', 'like', '%' . $keyword . '%')
        ->orWhere('page_content', 'like', '%' . $keyword . '%');
    })
      ->with(['pages' => function ($query) use ($keyword) {
        $query->where('page_title', 'like', '%' . $keyword . '%')
          ->orWhere('page_content', 'like', '%' . $keyword . '%');
      }])
      ->get();
  }
}
