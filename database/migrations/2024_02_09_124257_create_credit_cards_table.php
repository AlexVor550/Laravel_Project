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
        Schema::create('credit_card', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_data_id');
            $table->foreign('user_data_id')->references('id')->on('user_data')->onDelete('cascade');
            $table->string('payment_method'); // Метод оплаты (например, кредитная карта, дебетовая карта, PayPal)
            $table->string('cardholder_name'); // Имя владельца карты
            $table->string('card_number'); // Номер карты
            $table->string('expiration_date'); // Дата истечения срока действия карты
            $table->string('cvv'); // CVV-код
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credit_card');
    }
};
