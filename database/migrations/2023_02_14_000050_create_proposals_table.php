<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('company_name');
            $table->string('email')->unique();
            $table->text('description');
            $table->string('file_path');
            $table->foreignId('user_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('industry_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('service_id')->constrained()->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposals');
    }
}