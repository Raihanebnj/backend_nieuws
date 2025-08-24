<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FaqCategorie;
use App\Models\FaqVraag;

class FaqSeeder extends Seeder
{
    public function run()
    {
        // Categorie: Nieuwsitems
        $nieuwsCategorie = FaqCategorie::create(['naam' => 'Nieuwsitems']);

        $nieuwsCategorie->vragen()->createMany([
            [
                'vraag' => 'Hoe kan ik een nieuwsitem indienen?',
                'antwoord' => 'Gebruik het formulier onder "Nieuws indienen" op onze website om je artikel in te sturen.'
            ],
            [
                'vraag' => 'Kan ik mijn ingezonden nieuwsitem later aanpassen?',
                'antwoord' => 'Ja, stuur een wijzigingsverzoek via ons contactformulier en onze redactie past het artikel aan.'
            ],
            [
                'vraag' => 'Hoe wordt beslist welke nieuwsitems geplaatst worden?',
                'antwoord' => 'Onze redactie beoordeelt alle inzendingen op relevantie, actualiteit en betrouwbaarheid voordat ze geplaatst worden.'
            ],
            [
                'vraag' => 'Kan ik foto’s of video’s toevoegen aan mijn nieuwsitem?',
                'antwoord' => 'Ja, je kunt afbeeldingen en video’s uploaden via het indienen-formulier, mits deze rechtenvrij zijn of door jou gemaakt.'
            ],
        ]);

        // Categorie: Abonnementen
        $abonnementCategorie = FaqCategorie::create(['naam' => 'Abonnementen']);

        $abonnementCategorie->vragen()->createMany([
            [
                'vraag' => 'Hoe sluit ik een abonnement af?',
                'antwoord' => 'Ga naar de pagina "Abonnementen" en kies het pakket dat bij je past. Volg de stappen om af te rekenen.'
            ],
            [
                'vraag' => 'Kan ik mijn abonnement op elk moment opzeggen?',
                'antwoord' => 'Ja, je kunt maandelijks je abonnement opzeggen via je accountinstellingen.'
            ],
            [
                'vraag' => 'Wat gebeurt er als ik mijn betaling niet kan voltooien?',
                'antwoord' => 'Je ontvangt een herinnering per e-mail. Indien de betaling niet binnen een paar dagen wordt afgerond, wordt je abonnement tijdelijk gepauzeerd.'
            ],
        ]);

        // Categorie: Reacties & Interactie
        $reactiesCategorie = FaqCategorie::create(['naam' => 'Reacties & Interactie']);

        $reactiesCategorie->vragen()->createMany([
            [
                'vraag' => 'Hoe kan ik reageren op een artikel?',
                'antwoord' => 'Klik onder het artikel op "Reactie plaatsen", log in en typ je bericht.'
            ],
            [
                'vraag' => 'Worden reacties gemodereerd?',
                'antwoord' => 'Ja, alle reacties worden gecontroleerd op respect, taalgebruik en relevantie voordat ze zichtbaar zijn.'
            ],
            [
                'vraag' => 'Kan ik reacties van anderen rapporteren?',
                'antwoord' => 'Ja, gebruik de "Rapporteer" knop naast de betreffende reactie.'
            ],
        ]);

        // Categorie: Meldingen
        $meldingenCategorie = FaqCategorie::create(['naam' => 'Meldingen']);

        $meldingenCategorie->vragen()->createMany([
            [
                'vraag' => 'Hoe ontvang ik notificaties van nieuwe artikelen?',
                'antwoord' => 'Ga naar je profielinstellingen en schakel meldingen in voor onderwerpen of categorieën die je interesseren.'
            ],
            [
                'vraag' => 'Kan ik meldingen uitschakelen?',
                'antwoord' => 'Ja, je kunt alle meldingen uitzetten via je profielinstellingen onder "Notificaties".'
            ],
            [
                'vraag' => 'Waarom ontvang ik geen meldingen ondanks dat ze ingeschakeld zijn?',
                'antwoord' => 'Controleer je e-mailfilters en zorg dat onze e-mails niet in de spamfolder terechtkomen.'
            ],
        ]);

        // Categorie: Advertenties
        $advertentiesCategorie = FaqCategorie::create(['naam' => 'Advertenties']);

        $advertentiesCategorie->vragen()->createMany([
            [
                'vraag' => 'Hoe kan ik adverteren op jullie website?',
                'antwoord' => 'Neem contact op met onze advertentieafdeling via het formulier onder "Adverteren" op de website.'
            ],
            [
                'vraag' => 'Wat zijn de mogelijkheden voor gesponsorde artikelen?',
                'antwoord' => 'We bieden verschillende pakketten voor gesponsorde content, inclusief plaatsing op de homepage en in nieuwsbrieven.'
            ],
            [
                'vraag' => 'Hoe worden advertenties getoond aan gebruikers?',
                'antwoord' => 'Advertenties worden dynamisch geplaatst op basis van pagina, relevantie en gebruikersvoorkeuren.'
            ],
        ]);

        // Categorie: Technische Problemen
        $technischCategorie = FaqCategorie::create(['naam' => 'Technische Problemen']);

        $technischCategorie->vragen()->createMany([
            [
                'vraag' => 'De website laadt niet goed, wat kan ik doen?',
                'antwoord' => 'Probeer je browsercache te legen of een andere browser te gebruiken. Als het probleem blijft, neem contact op met onze support.'
            ],
            [
                'vraag' => 'Sommige afbeeldingen of artikelen worden niet geladen, hoe los ik dat op?',
                'antwoord' => 'Controleer je internetverbinding en refresh de pagina. Als het probleem aanhoudt, meld dit aan onze technische dienst.'
            ],
            [
                'vraag' => 'Kan ik de website ook op mobiel gebruiken?',
                'antwoord' => 'Ja, onze website is volledig responsive en werkt op alle moderne smartphones en tablets.'
            ],
        ]);
    }
}
