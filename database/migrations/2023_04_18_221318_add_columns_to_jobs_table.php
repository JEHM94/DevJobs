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
        Schema::table('jobs', function (Blueprint $table) {
            $table->string('name');
            $table->foreignId('salary_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('company');
            $table->date('expiration_date');
            $table->text('description');
            $table->string('image');
            $table->integer('active')->default(1);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropForeign('jobs_category_id_foreign');
            $table->dropForeign('jobs_salary_id_foreign');
            $table->dropForeign('jobs_user_id_foreign');

            $table->dropColumn([
                'name',
                'salary_id',
                'category_id',
                'company',
                'expiration_date',
                'description',
                'image',
                'active',
                'user_id',
            ]);
        });
    }
};
