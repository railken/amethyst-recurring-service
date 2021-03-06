<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

class CreateRecurringServicesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create(Config::get('amethyst.recurring-service.managers.recurring-service.table'), function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('code')->unique();
            $table->text('description')->nullable();
            $table->text('notes')->nullable();
            $table->string('country');
            $table->string('locale');
            $table->string('currency');
            $table->boolean('enabled')->default(1);
            $table->float('price_starting')->default(0);
            $table->float('price')->default(0);
            $table->float('price_ending')->default(0);
            $table->integer('tax_id')->unsigned()->nullable();
            $table->foreign('tax_id')->references('id')->on(Config::get('amethyst.tax.managers.tax.table'));
            $table->integer('catalogue_id')->unsigned()->nullable();
            $table->foreign('catalogue_id')->references('id')->on(Config::get('amethyst.catalogue.managers.catalogue.table'));
            $table->string('frequency_unit');
            $table->integer('frequency_value');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists(Config::get('amethyst.recurring-service.managers.recurring-service.table'));
    }
}
