<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('solicitacoes_adocao', function (Blueprint $table) {
            if (!Schema::hasColumn('solicitacoes_adocao', 'complemento')) {
                $table->string('complemento')->nullable()->after('numero');
            }
        });
    }

    public function down(): void
    {
        Schema::table('solicitacoes_adocao', function (Blueprint $table) {
            $table->dropColumn('complemento');
        });
    }
};