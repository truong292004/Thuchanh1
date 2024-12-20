<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('computers', function (Blueprint $table) {
            $table->id();
            $table->string('computer_name',50);
            $table->string('model',100);
            $table->string('operating_system',50);
            $table->string('processor',50);
            $table->integer('memory');
            $table->boolean('available');
            $table->timestamps();
        });
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('computer_id')->constrained('computers')->onDelete('cascade');
            $table->string('reported_by',50);
            $table->date('reported_date');
            $table->text('description');
            $table->enum('urgency',['Low','Medium','High']);
            $table->enum('status',['Open','In progress','Resolved']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
        Schema::dropIfExists('computers');

    }
};
