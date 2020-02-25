<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogUpload extends Model
{
    //
    protected $fillable = ['user_id', 'role_id', 'file_id', 'folder_id', 'action'];

    public function file()
    {
        return $this->belongsTo(File::class, 'file_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function folder()
    {
        return $this->belongsTo(Folder::class, 'folder_id');
    }
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

}
