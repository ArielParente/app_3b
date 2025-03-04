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
        Schema::create('entries', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->foreignId('invoice_id')->nullable()->constrained('invoices')->onDelete('set null');
            $table->dateTime('entry_date');
            $table->string('entry_type');
            $table->string('account_code');
            $table->text('description');
            $table->decimal('amount', 15, 2);
            $table->string('nature');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.*/
    public function down(): void
    {
        Schema::dropIfExists('entries');
    }
};
