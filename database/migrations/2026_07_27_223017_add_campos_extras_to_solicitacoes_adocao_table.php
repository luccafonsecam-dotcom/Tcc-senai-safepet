<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('solicitacoes_adocao', function (Blueprint $table) {
            if (!Schema::hasColumn('solicitacoes_adocao', 'concordancia_casa')) {
                $table->string('concordancia_casa')->after('tem_outros_pets');
            }
            if (!Schema::hasColumn('solicitacoes_adocao', 'consciencia_financeira')) {
                $table->string('consciencia_financeira')->after('concordancia_casa');
            }
            if (!Schema::hasColumn('solicitacoes_adocao', 'plano_viagem')) {
                $table->text('plano_viagem')->after('consciencia_financeira');
            }
            if (!Schema::hasColumn('solicitacoes_adocao', 'comportamento_animal')) {
                $table->text('comportamento_animal')->after('plano_viagem');
            }
        });
    }

    public function down(): void
    {
        Schema::table('solicitacoes_adocao', function (Blueprint $table) {
            $table->dropColumn([
                'concordancia_casa',
                'consciencia_financeira',
                'plano_viagem',
                'comportamento_animal',
            ]);
        });
    }
};