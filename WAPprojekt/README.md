WAP Projekt - Administrace databáze
Tento projekt je webová aplikace v PHP, která umožňuje administraci a správu databáze pomocí jednoduchého uživatelského rozhraní. Aplikace je postavena na principu objektově orientovaného programování a využívá vlastní implementaci rozhraní pro přístup k databázi.

Funkce aplikace
Aplikace umožňuje následující operace s databází:

Zobrazení existujících záznamů v tabulkách "Users" a "Posts".
Vkládání nových záznamů do tabulek "Users" a "Posts".
Úpravu stávajících záznamů v tabulkách "Users" a "Posts".
Mazání záznamů z tabulek "Users" a "Posts".
Požadavky
Pro správné fungování aplikace je třeba mít nainstalováno následující:

Webový server (např. Apache) s podporou PHP.
PHP verze 7.0 nebo vyšší.
MySQL databázi.
Instalace
Následujte tyto kroky pro správnou instalaci aplikace:

Naklonujte si repozitář do svého webového adresáře:

bash
Copy code
git clone <repozitář>
Vytvořte novou MySQL databázi s názvem mydatabase:

sql
Copy code
CREATE DATABASE mydatabase;
Importujte strukturu databáze a fiktivní data ze souboru database.sql:

css
Copy code
mysql -u <username> -p mydatabase < database.sql
Upravte soubor mysql.php a zadejte přístupové údaje k vaší MySQL databázi.

Spusťte aplikaci otevřením souboru index.php ve vašem webovém prohlížeči.

Použití
Po správné instalaci a spuštění aplikace se zobrazí jednoduché uživatelské rozhraní s tabulkami "Users" a "Posts". V těchto tabulkách můžete vidět existující záznamy a provádět různé operace.

Zobrazení záznamů: V tabulkách jsou zobrazeny existující záznamy v databázi.

Vkládání nového záznamu: Použijte formuláře "New User" a "New Post" pro vytvoření nového záznamu v příslušné tabulce. Vyplňte požadované údaje a stiskněte tlačítko "Create".

Úprava stávajícího záznamu: U každého záznamu v tabulkách je možnost úpravy. Stiskněte tlačítko "Edit" u daného záznamu a vyplňte nové hodnoty v příslušném formuláři. Poté stiskněte tlačítko "Update" pro provedení změn.

Mazání záznamu: Pro smazání záznamu stiskněte tlačítko "Delete" u daného záznamu. Tím dojde k odstranění záznamu z příslušné tabulky.

Omezení
Tato aplikace slouží pouze jako demonstrace a jednoduchý nástroj pro správu databáze. Je důležité si uvědomit, že v reálném prostředí by bylo nutné provést další kroky pro zabezpečení a správné zpracování dat. Tento projekt by měl být používán pouze pro výukové a testovací účely.

Autor
Tento projekt byl vytvořen jako součást výuky webového vývoje a objektově orientovaného programování. Autor projektu je [your_name].

Licence
Tento projekt je licencován pod [licencí]. Podrobnosti naleznete v souboru LICENSE.
