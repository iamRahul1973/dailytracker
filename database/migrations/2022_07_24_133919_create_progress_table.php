<?php

use App\Models\Progress;
use App\Models\Task;
use App\Models\User;
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
        Schema::create('progress', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Task::class)->restrictOnDelete();
            $table->date('date');
            $table->foreignIdFor(User::class, 'employee')->restrictOnDelete();
            $table->unsignedSmallInteger('time_taken')->comment('In Minutes');
            $table->enum('status', array_keys(Progress::status()))->default('not-started');
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('progress');
    }
};
