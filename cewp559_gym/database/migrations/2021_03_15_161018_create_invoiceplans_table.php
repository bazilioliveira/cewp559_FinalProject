<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceplansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoiceplans', function(Blueprint $table)
		{
			$table->integer('invoicePlanId')->index('fk_invoice_has_plans_invoice1_idx');
			$table->integer('planId')->index('fk_invoice_has_plans_plans1_idx');
			$table->float('price', 10, 0);
			$table->integer('quantity');
			$table->primary(['invoicePlanId','planId']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('invoiceplans');
	}

}
