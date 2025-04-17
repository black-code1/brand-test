<?php

namespace Database\Seeders;

use App\Enums\NodeTypeCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $node_types = [
            [
                'label' => json_encode([
                    'fr' => 'Liste statique',
                    'en' => 'Static List',
                ]),
                'code' => NodeTypeCode::STATIC_LIST,
                'description' => 'Noeud contenant une liste de valeur',
                'created_at' => now(),
            ],
            [
                'label' => json_encode([
                    'fr' => 'Formulaire',
                    'en' => 'Form',
                ]),
                'code' => NodeTypeCode::FORM,
                'description' => 'Noeud demandant des informations a l\'utilisateur',
                'created_at' => now(),
            ],
            [
                'label' => json_encode([
                    'fr' => 'Message',
                    'en' => 'Message',
                ]),
                'code' => NodeTypeCode::MESSAGE,
                'description' => 'Node renvoyant un message a l\'utilisateur',
                'created_at' => now(),
            ],
            [
                'label' => json_encode([
                    'fr' => 'Liste dynamique',
                    'en' => 'Dynamic List',
                ]),
                'code' => NodeTypeCode::DYNAMIC_LIST,
                'description' => 'Noeud contenant une liste dynamique de valeurs',
                'created_at' => now(),
            ],
            [
                'label' => json_encode([
                    'fr' => "Démarrage d'un flow",
                    'en' => 'Flow Start',
                ]),
                'code' => NodeTypeCode::FLOW_START,
                'description' => 'Noeud permettant de démarrer un flow',
                'created_at' => now(),
            ],
            [
                'label' => json_encode([
                    'fr' => "Fin d'un flow",
                    'en' => 'Flow End',
                ]),
                'code' => NodeTypeCode::FLOW_END,
                'description' => 'Noeud permettant de terminer un flow',
                'created_at' => now(),
            ],
            [
                'label' => json_encode([
                    'fr' => 'Question',
                    'en' => 'Question',
                ]),
                'code' => NodeTypeCode::QUESTION,
                'description' => 'Noeud permettant de poser une question à l\'utilisateur, à laquelle l\'utilisateur peut répondre avec une réponse "oui" ou "non"',
                'created_at' => now(),
            ],
            [
                'label' => json_encode([
                    'fr' => 'Traitement',
                    'en' => 'Process',
                ]),
                'code' => NodeTypeCode::PROCESS,
                'description' => 'Noeud permettant d\'executer une tâche en arrière plan',
                'created_at' => now(),
            ],
            [
                'label' => json_encode([
                    'fr' => 'Ticket',
                    'en' => 'Ticket',
                ]),
                'code' => NodeTypeCode::TICKET,
                'description' => 'Noeud permettant de signaler au client qu\un ticket a été créé et qu\'une intervention humaine pourra être effectuée',
                'created_at' => now(),
            ],
        ];

        DB::table('node_types')->upsert($node_types, ['code'], ['label', 'description']);
    }
}
