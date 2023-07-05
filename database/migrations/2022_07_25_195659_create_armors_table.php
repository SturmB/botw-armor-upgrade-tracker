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
        Schema::create("botw_armors", function (Blueprint $table) {
            $table->smallIncrements("id");
            $table->string("name", 100);
            $table->string("image", 100)->nullable();
            $table->boolean("upgradable")->default(1);
            $table->unsignedSmallInteger("botw_armor_set_id")->nullable();
            $table->timestamps();

            $table
                ->foreign("botw_armor_set_id")
                ->references("id")
                ->on("botw_armor_sets")
                ->cascadeOnUpdate()
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists("botw_armors");
    }
};
