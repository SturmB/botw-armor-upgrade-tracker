<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create("armor_resource", function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger("armor_id");
            $table->unsignedSmallInteger("resource_id");
            $table->unsignedTinyInteger("tier");
            $table->unsignedSmallInteger("quantity_needed");
            $table->timestamps();

            $table
                ->foreign("armor_id")
                ->references("id")
                ->on("armors")
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table
                ->foreign("resource_id")
                ->references("id")
                ->on("resources")
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
        Schema::dropIfExists("armor_resource");
    }
};
