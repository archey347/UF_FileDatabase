<?php
/*
 * UserFrosting File Database Sprinkle
 *
 * @link      https://github.com/archey347/UF_FileDatabase
 * @copyright Copyright (c) 2020 Archey Barrell
 */

 namespace UserFrosting\Sprinkle\FileDB\Database\Migrations\v000;

 use UserFrosting\System\Bakery\Migration;
 use Illuminate\Database\Schema\Blueprint;

 /**
  * Class for creating the Files Table
  *
  * @author Archey Barrell
  */
 class FileablesTable extends Migration
 {
     public function up() 
     {
         if(!$this->schema->hasTable('fileables')) {
             $this->schema->create('fileables', function (Blueprint $table) {
                 $table->increments('id');

                 $table->unsignedInteger("file_id");
                 $table->unsignedInteger("fileable_id");
                 $table->string("fileable_type");

                 $table->softDeletes();
             });
         }
     }

     public function down() {
         $this->schema->drop('fileables');
     }
 }