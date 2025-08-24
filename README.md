# Laravel Dynamische Website – Backend Web Eindopdracht (Herexamen)
Projectoverzicht

Dit project is een dynamische website ontwikkeld met Laravel 12. Het dient als praktische toepassing van de concepten die gedurende het vak Backend Web zijn geleerd, waaronder:

MVC-architectuur

Databases en Eloquent-relaties

User authentication en autorisatie

Content management (nieuws, FAQ, contactformulieren)

Het doel van dit project is het bouwen van een modulaire, goed gestructureerde webapplicatie waarbij alle basisfunctionaliteiten volledig werken, met mogelijkheid tot uitbreidingen voor een hogere score.


## Inhoudsopgave

- [Projectoverzicht](#projectoverzicht)
- [Functionaliteiten](#functionaliteiten)
  - [Authenticatie & Gebruikersbeheer](#authenticatie--gebruikersbeheer)
  - [Profielpagina](#profielpagina)
  - [Laatste nieuwtjes](#laatste-nieuwtjes)
  - [FAQ-pagina](#faq-pagina)
  - [Contactpagina](#contactpagina)
- [Technische implementatie](#technische-implementatie)
  - [Views](#views)
  - [Routes](#routes)
  - [Controllers](#controllers)
  - [Models](#models)
  - [Database](#database)
  - [Authenticatie](#authenticatie)
- [Installatiehandleiding](#installatiehandleiding)
- [Gebruikte bronnen](#gebruikte-bronnen)


## Functionaliteiten
1. ### Authenticatie & Gebruikersbeheer

Registreren van nieuwe gebruikers

Inloggen/Uitloggen met 'Remember me'

Wachtwoord reset functionaliteit

Default admin account:

Username: admin

Email: admin@ehb.be

Password: Password!321

Adminrechten beheren: alleen admins kunnen andere gebruikers promoveren/demoteren

Alleen admins kunnen handmatig nieuwe gebruikers aanmaken

2. ### Profielpagina

Publiek profiel voor elke gebruiker

Eigen data aanpassen door ingelogde gebruiker

Velden: username, verjaardag, profielfoto, “over mij”-tekst

3. ### Laatste nieuwtjes

Admins kunnen nieuwsitems toevoegen, wijzigen en verwijderen

Elke bezoeker kan lijst van nieuwsitems bekijken en detailpagina openen

Nieuwsitem bevat: titel, afbeelding, content, publicatiedatum

4. ### FAQ-pagina

Lijst van vragen en antwoorden, gegroepeerd per categorie

Admins kunnen categorieën en Q&A’s beheren

Bezoekers kunnen FAQ bekijken

5. ### Contactpagina

Contactformulier voor bezoekers

Verstuurde berichten worden per e-mail naar admin gestuurd


##Technische implementatie
### Views

Minstens twee layouts gebruikt (main.blade.php, auth.blade.php)

Componenten gebruikt voor herbruikbare elementen zoals nieuws-item en FAQ-item

XSS & CSRF bescherming ingeschakeld

Client-side validatie op formulieren

### Routes

Alle routes via controller-methoden

Middleware toegepast voor auth en admin-only routes

Routes gegroepeerd per functionaliteit

### Controllers

Controllers gestructureerd per entiteit (UserController, NewsController, FAQController, ContactController)

CRUD-operaties via resource controllers

### Models

Eloquent models voor alle entiteiten

Relaties:

One-to-many: User → News

Many-to-many: User ↔ Roles

### Database

Migraties en seeders aanwezig

Database bevat basisdata + default admin

Compatibel met php artisan migrate:fresh --seed

### Authenticatie

Laravel’s ingebouwde auth gebruikt

Login, logout, registratie, wachtwoord reset volledig functioneel


## Installatiehandleiding

Clone de repository

git clone <repository-url>
cd <project-folder>


Dependencies installeren

composer install
npm install
npm run dev


Environment configureren

cp .env.example .env
php artisan key:generate


Pas database-instellingen in .env aan.

Database migraties en seeders uitvoeren

php artisan migrate:fresh --seed


Server starten

php artisan serve


Bezoek http://127.0.0.1:8000 in je browser.


## Gebruikte bronnen

Laravel 12 documentatie: https://laravel.com/docs/12.x

StackOverflow / Laravel forums

AI chatlogs ter ondersteuning van probleemoplossing
