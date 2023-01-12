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
        Schema::table('wallets', function (Blueprint $table) {
            $table->decimal("from_value", $precision = 8, $scale = 2);
            $table->bigInteger("from_jeton");
            $table->decimal("to_value", $precision = 8, $scale = 2);
            $table->bigInteger("to_jeton");
            $table->dropColumn("author_name");
            $table->dropColumn("jeton_id");
            $table->dropColumn('amount', $precision = 8, $scale = 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wallets', function (Blueprint $table) {
            //
        });
    }
};
