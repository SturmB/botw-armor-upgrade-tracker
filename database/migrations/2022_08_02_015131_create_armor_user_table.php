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
        Schema::create("botw_armor_user", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("user_id")
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->unsignedSmallInteger("botw_armor_id");
            $table->boolean('tracking')->default(true);
            $table->unsignedTinyInteger("tracking_tier_start")->default(1);
            $table->unsignedTinyInteger("tracking_tier_end")->default(4);
            $table->timestamps();

            $table
                ->foreign("botw_armor_id")
                ->references("id")
                ->on("botw_armors")
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
        Schema::dropIfExists("botw_armor_user");
    }
};
