<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
  use HasFactory;
  use SoftDeletes;
  protected $fillable = ['user_id', 'note_id', 'page_title', 'page_content', 'deleted_at'];
  public function note()
  {
    return $this->belongsTo(Note::class);
  }
  /**
   * 部分検索機能
   * 
   * @param string $word 入力した検索ワード
   */
  public function searchWord($keyword)
  {
    return $this
      ->where('page_title', 'like', '%' . $keyword . '%')
      ->orWhere('page_content', 'like', '%' . $keyword . '%')
      ->get();
  }
  public function searchShowing($value)
  {
    return $this
      ->where('note_id', $value)
      ->paginate(20);
  }
}
