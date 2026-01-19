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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->timestamps();
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table                    // sotto, commentati, gli statement SQL equivalenti
            ->foreignId('project_id') // ALTER TABLE `tasks` ADD `project_id` BIGINT UNSIGNED NOT NULL 
            ->constrained(            // ALTER TABLE `tasks` ADD CONSTRAINT `tasks_project_id_foreign` 
               'projects')            //      FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`)
            ->onUpdate('cascade')     //      ON UPDATE CASCADE
            ->onDelete('cascade');    //      ON DELETE CASCADE
            ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
