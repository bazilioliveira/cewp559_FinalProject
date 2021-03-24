<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoice', function(Blueprint $table)
		{
			$table->integer('invoiceId', true);
			$table->timestamp('invoiceDate')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('invoiceClientId')->index('fk_invoice_clients_idx');
			$table->integer('invoiceStaffId')->index('fk_invoice_staff1_idx');
			$table->integer('paymentMethod_paymentId')->index('fk_invoice_paymentMethod1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('invoice');
	}

}
