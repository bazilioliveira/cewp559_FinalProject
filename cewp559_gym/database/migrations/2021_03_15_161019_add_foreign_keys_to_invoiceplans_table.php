<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToInvoiceplansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('invoiceplans', function(Blueprint $table)
		{
			$table->foreign('invoicePlanId', 'fk_invoice_has_plans_invoice1')->references('invoiceId')->on('invoice')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('planId', 'fk_invoice_has_plans_plans1')->references('planId')->on('plans')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('invoiceplans', function(Blueprint $table)
		{
			$table->dropForeign('fk_invoice_has_plans_invoice1');
			$table->dropForeign('fk_invoice_has_plans_plans1');
		});
	}

}
