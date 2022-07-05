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
            $table->string('kode_pemesanan')->unique();
            $table->foreignId('user_id');
            $table->foreignId('metode_pembayaran');
            $table->foreignId('status_pembayaran')->default(0);
            $table->foreignId('status_id')->default(1);
            $table->unsignedBigInteger('gedung_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name');
            $table->string('email');
            $table->string('nomor_telepon');
            $table->string('bukti_pembayaran')->default('Belum Dikirim');
            $table->string('pembayaransisa')->default('Belum Dikirim');
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
