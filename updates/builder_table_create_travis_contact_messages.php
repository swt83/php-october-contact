<?php namespace Travis\Contact\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTravisContactMessages extends Migration
{
    public function up()
    {
        Schema::create('travis_contact_messages', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('first', 20)->nullable();
            $table->string('last', 20)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('subject', 200)->nullable();
            $table->string('message', 5000)->nullable();
            $table->boolean('is_important');
            #
            $table->index('email');
            $table->index('is_important');
        });
    }

    public function down()
    {
        Schema::dropIfExists('travis_contact_messages');
    }
}
