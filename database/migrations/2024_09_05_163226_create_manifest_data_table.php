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
        Schema::create('manifest_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manifestId');
            $table->foreign('manifestId')->references('id')->on('upload_manifests')->onDelete('cascade');
            $table->String('BLnumber');
            $table->String('containerNo');
            $table->String('Number_of_packages');
            $table->String('type_of_container');
            $table->String('package_type');
            $table->String('gross_mass');
            $table->String('description');
            $table->String('CBM');

            $table->String('vesselName');
            $table->String('exporterName');
            $table->String('exporterAddress');
            $table->String('consigneeName');
            $table->String('consigneeAddress');
            $table->String('discharging_port');
            $table->String('loading_port');
            $table->String('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manifest_data');
    }
};
