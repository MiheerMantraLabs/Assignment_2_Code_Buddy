<?php

use App\Models\Catelog;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatelogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catelogs', function (Blueprint $table) {
            $table->id();
            $table->string('catelog_name');
            $table->integer('parent_id');
            $table->timestamps();
        });

        $catelogs = new Catelog();
        $catelogs->catelog_name = "root";
        $catelogs->parent_id = 0;
        $catelogs->save();
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catelogs');
    }
}
