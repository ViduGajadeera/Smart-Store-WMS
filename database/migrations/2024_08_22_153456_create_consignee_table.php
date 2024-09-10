<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('consignee', function (Blueprint $table) {
            $table->id();
            $table->String('fname');
            $table->String('lname');
            $table->String('email');
            $table->String('address');
            $table->String('tinNumber');
            $table->String('contact');
            $table->String('BRnumber');
            $table->String('password');
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consignee');
    }
};
