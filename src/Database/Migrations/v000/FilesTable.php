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
 class FilesTable extends Migration
 {
     public function up() 
     {
         if(!$this->schema->hasTable('files')) {
             $this->schema->create('files', function (Blueprint $table) {
                 $table->increments('id');
                 
                 $table->string("name");

                 $table->unsignedInteger("fileable_id");
                 $table->string("fileable_type");

                 $table->timestamps();
             });
         }
     }

     public function down() {
         $this->schema->drop('files');
     }
 }