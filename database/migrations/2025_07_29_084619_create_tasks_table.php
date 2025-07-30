<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Exécutée lors de la migration : création de la table 'tasks'
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            // Clé primaire auto-incrémentée
            $table->id();

            // Titre de la tâche (obligatoire par défaut)
            $table->string('title');

            // Statut de complétion (true = terminée, false = en cours)
            $table->boolean('is_completed')->default(false);

            // Colonne 'deleted_at' pour les suppressions logiques (SoftDeletes)
            $table->softDeletes();

            // Colonnes 'created_at' et 'updated_at' automatiquement gérées par Laravel
            $table->timestamps();
        });
    }

    /**
     * Inverser la migration : suppression de la table 'tasks'
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
