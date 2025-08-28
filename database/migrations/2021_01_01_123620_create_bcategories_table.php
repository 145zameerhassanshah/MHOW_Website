<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBcategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('bcategories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // {"en": "Category Name", "ar": "اسم الفئة"}
            $table->text('description')->nullable(); // {"en": "Category Description", "ar": "وصف الفئة"}`
            $table->string('slug', 255)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('serial_number')->default(0);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('bcategories');
    }
}