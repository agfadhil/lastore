<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogUpload extends Model
{
    //
    protected $fillable = ['user_id', 'role_id', 'file_id', 'folder_id', 'action', 'updated_at'];
    public $timestamps = false;

    public function file()
    {
        return $this->belongsTo(File::class, 'file_id')->withTrashed();
    }
}
