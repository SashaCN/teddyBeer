<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => Carbon::now(),
            'password' => \Illuminate\Support\Facades\Hash::make('admin'),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \App\Models\User::where('email', 'admin@admin.com')->delete();
    }
};
