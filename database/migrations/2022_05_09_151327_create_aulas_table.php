<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aulas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('status_id')->default(1);
            $table->string('name');
            $table->string('email');
            $table->string('nomor_telepon');
            $table->timestamp('tanggal_mulai')->useCurrent();
            $table->timestamp('tanggal_selesai')->useCurrent();
            $table->string('total');
            $table->text('alamat');
            $table->text('pesan');
            $table->string('keperluan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aulas');
    }
};
