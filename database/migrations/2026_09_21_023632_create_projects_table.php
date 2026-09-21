<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Bikin tabel projects sama nentuin kolom-kolomnya
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->timestamps();
        });
    }

    // Rollback atau hapus tabel projects kalo migration di-undo
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
