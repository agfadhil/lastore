<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UploadFileLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if(! Schema::hasTable('log_uploads')) {
            //id, userid, rolesid, fileid,folderid,date time.
            Schema::create('log_uploads', function(Blueprint $table){
                $table->increments('id');            
                $table->timestamp('updated_at')->nullable();
                $table->string('action');
            });
        }

        Schema::table('log_uploads', function(Blueprint $table) {

            if (!Schema::hasColumn('log_uploads', 'user_id')) {
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            }
            if (!Schema::hasColumn('log_uploads', 'role_id')) {
                $table->integer('role_id')->unsigned()->nullable();
                $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            }
            if (!Schema::hasColumn('log_uploads', 'file_id')) {
                $table->integer('file_id')->unsigned()->nullable();
                $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
            }
            if (!Schema::hasColumn('log_uploads', 'folder_id')) {
                $table->integer('folder_id')->unsigned()->nullable();
                $table->foreign('folder_id')->references('id')->on('folders')->onDelete('cascade');
            }

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('log_uploads');
    }
}

