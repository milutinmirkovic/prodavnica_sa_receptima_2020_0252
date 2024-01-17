<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReceptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('recept')->insert([
            [
                'naziv' => 'Palačinke',
                'tekst' => 'Uzmite dublju plastičnu posudu i u nju sipajte brašno, dodajte jaja i oko 2 dl mleka. Probajte da umutite i ako ne ide dodajte još malo mleka.
                Savet: testo možete napraviti samo sa vodom ili samo sa mlekom. Najbolje je kada stavite pola mineralne vode i pola mleka.
                Važno je da testo bude gusto i da ga mutite dok ne postane glatko, bez grudvica, potom dodajte još mleka, pa malo kisele vode i tako dok ne dobijete testo koje liči na čorbu. U umućeno testo dodajte oko 1 dl ulja i dobro promešajte.
                Savet: testo će biti bolje ako ga pustite da odstoji 20-30 minuta.
                U tiganj sipajte ulje pa kad se zagreje izručite ulje, tako da tiganj ostane samo masan. Vratite ga na ringlu i onda sipajte kutlačom testo, koje treba da bude ravnomerno raspoređeno po tiganju. Temperatura na kojoj se palačinke peku mora biti visoka. Ostavite nekoliko trenutaka na ringli, a onda prevrnite nožem ili bacite u vis.
                Savet: koristite samo teflonske tiganje jer ćete tako izbeći da Vam se palačinke zalepe za dno, tj. neće morati stalno da "podmazujete" tiganj.
                Čim se ispeče jedna strana palačinke, okrenite je na drugu stranu i pecite isto koliko i prvu (otprilike oko 1 minut). Gotove palačinke izbacite na plitak tanjir i filujte.',
               
                'kategorija_recepta_id' => 3
            ],
           
        ]);
    }
}
