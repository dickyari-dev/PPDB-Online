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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();

            // Relasi ke user siswa
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Data Pribadi
            $table->string('full_name');
            $table->string('nik')->unique(); // Nomor Induk Kependudukan
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->enum('gender', ['L', 'P']);
            $table->string('religion')->nullable();
            $table->string('nationality')->default('Indonesia');

            // Alamat
            $table->text('address');
            $table->string('village')->nullable();
            $table->string('district')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('postal_code')->nullable();

            // Kontak
            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            // Data Orang Tua
            $table->string('father_name')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->decimal('parent_income', 12, 2)->nullable();

            // Pendidikan Sebelumnya
            $table->string('previous_school')->nullable();
            $table->string('school_address')->nullable();
            $table->string('school_npsn')->nullable(); // NPSN Sekolah Asal
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
