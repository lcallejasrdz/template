<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewWebContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW view_web_contacts AS
            (
                SELECT
                    web_contacts.id,
                    web_contacts.name,
                    web_contacts.email,
                    web_contacts.phone,
                    web_contacts.message,
                    web_contacts.created_at

                FROM `web_contacts`
            )
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS view_web_contacts');
    }
}
