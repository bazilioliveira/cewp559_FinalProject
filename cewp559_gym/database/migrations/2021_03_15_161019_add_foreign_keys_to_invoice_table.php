<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToInvoiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('invoice', function(Blueprint $table)
		{
			$table->foreign('invoiceClientId', 'fk_invoice_clients')->references('clientId')->on('clients')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('paymentMethod_paymentId', 'fk_invoice_paymentMethod1')->references('paymentId')->on('paymentmethod')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('invoiceStaffId', 'fk_invoice_staff1')->references('staffId')->on('staff')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('invoice', function(Blueprint $table)
		{
			$table->dropForeign('fk_invoice_clients');
			$table->dropForeign('fk_invoice_paymentMethod1');
			$table->dropForeign('fk_invoice_staff1');
		});
	}

}
