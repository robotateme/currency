<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('rate');
            $table->date('date');
            $table->string('iso_code');
            $table->timestamps();
            $table->index(['date', 'iso_code'], 'currencies_date_rate_idx');
            $table->index(['iso_code', 'rate'], 'currencies_iso_code_rate_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currencies');
    }
}
