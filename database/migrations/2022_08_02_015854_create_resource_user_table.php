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
    public function up()
    {
        Schema::create("resource_user", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("user_id")
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->unsignedSmallInteger("resource_id");
            $table->unsignedSmallInteger("quantity_owned")->default(0);
            $table->timestamps();

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
    public function down()
    {
        Schema::dropIfExists("resource_user");
    }
};
