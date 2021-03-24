<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('staff', function(Blueprint $table)
		{
			$table->integer('staffId', true);
			$table->string('staffName', 100);
			$table->string('staffRole', 100);
			$table->string('staffManager', 100);
			$table->timestamp('staffLastLogin')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('manager_managerId')->index('fk_staff_manager1_idx');
			$table->string('staffPassword', 45);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('staff');
	}

}
