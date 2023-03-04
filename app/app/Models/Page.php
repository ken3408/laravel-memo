<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
  use HasFactory;
  use SoftDeletes;
  protected $fillable = ['user_id', 'note_id', 'page_title', 'page_content', 'deleted_at'];
}
