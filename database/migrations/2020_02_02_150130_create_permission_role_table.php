<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionRoleTable extends Migration
{
    /**
     * Run migration
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_role', function (Blueprint $table) {
            $table->unsignedInteger('role_id');
            $table->unsignedBigInteger('permission_id');
            $table->userstamps(false);

            $table->primary(['role_id', 'permission_id']);

            $table->foreign('role_id')
                ->references('id')
                ->on('access_roles')
                ->onDelete('cascade');

            $table->foreign('permission_id')
                ->references('id')
                ->on('permissions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse migration
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_role');
    }
}
