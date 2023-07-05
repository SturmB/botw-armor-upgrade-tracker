<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create("botw_armor_resource", function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger("botw_armor_id");
            $table->unsignedSmallInteger("botw_resource_id");
            $table->unsignedTinyInteger("tier");
            $table->unsignedSmallInteger("quantity_needed");
            $table->timestamps();

            $table
                ->foreign("botw_armor_id")
                ->references("id")
                ->on("botw_armors")
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table
                ->foreign("botw_resource_id")
                ->references("id")
                ->on("botw_resources")
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists("botw_armor_resource");
    }
};
