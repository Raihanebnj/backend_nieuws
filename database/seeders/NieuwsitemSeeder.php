<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nieuwsitem;
use Illuminate\Support\Carbon;

class NieuwsitemSeeder extends Seeder
{
    public function run(): void
    {
        Nieuwsitem::insert([
            [
                'titel' => 'Nieuwe stadsbibliotheek geopend',
                'afbeelding' => 'nieuws/zomerfestival.jpg',
                'content' => 'De nieuwe stadsbibliotheek opent zijn deuren met een feestelijke ceremonie en rondleidingen voor bezoekers.',
                'publicatiedatum' => Carbon::now()->subDays(2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titel' => 'Lokale filmmaker wint prijs',
                'afbeelding' => 'nieuws/filmavond.jpg',
                'content' => 'Een film gemaakt door een lokale filmmaker heeft een prestigieuze nationale prijs gewonnen.',
                'publicatiedatum' => Carbon::now()->subDays(1),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titel' => 'Kunstroute door de stad',
                'afbeelding' => 'nieuws/kunstmarkt.jpg',
                'content' => 'Bezoekers kunnen deze week genieten van een kunstroute langs verschillende galerieën en ateliers.',
                'publicatiedatum' => Carbon::now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titel' => 'Sportnieuws: lokaal team behaalt overwinning',
                'afbeelding' => 'nieuws/sportdag.jpg',
                'content' => 'Het lokale sportteam heeft een spannende overwinning behaald in de regionale competitie.',
                'publicatiedatum' => Carbon::now()->subHours(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
