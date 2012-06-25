<?php
//Datenbank
define('QUERYERROR','Etwas stimmte mit dem Query nicht: ');

//Profil bearbeiten
define('PROFILE_HEADER','<h3>Profil bearbeiten</h3>');
define('PROFILE_SUBHEADER','Profil bearbeiten');
define('PROFILE_CONFIRM','Aktualisieren');
define('PROFILE_REALNAME','<strong>Name:</strong>');
define('PROFILE_EMAIL','<strong>E-Mail:</strong>');
define('PROFILE_STREET','<strong>Stra&szlig;e:</strong>');
define('PROFILE_STREET_NO','<strong>Hausnummer:</strong>');
define('PROFILE_CITY','<strong>Stadt:</strong>');
define('PROFILE_ZIP','<strong>PLZ:</strong>');
define('PROFILE_COUNTRY','<strong>Land:</strong>');
define('PROFILE_PHONE','<strong>Telefon:</strong>');
define('PROFILE_PHONE_MOBILE','<strong>Mobilfunktelefon:</strong>');
define('PROFILE_FAX','<strong>Fax:</strong>');
define('PROFILE_INFO','<strong>Zusatzinformationen:</strong>');
define('PROFILE_UPDATED','<p style="text-align: center; color: red; font-size: 1.5em; font-weight: bold; margin: 0; padding: 0;">Profil wurde aktualisiert.');


//register.php
define('INVALID_FORM', 'Benutze nur Formulare von dieser Seite.<br />');
define('REGISTERHEAD', 'In dieser Bibliothek Mitglied werden');
define('SAMEPWD', 'Bitte zweimal das gleich Passwort eingeben.<br />');
define('EMPTY_FORM', 'Bitte das Formulare vollst&auml;ndig ausf&uuml;llen.<br />');
define('ERROR_USERNAME', 'Der Benutzername darf nur aus 3 bis 30 Zeichen bestehen und keine Leerzeichen enthalten.<br />');
define('USED_USERNAME', 'Der Username wird bereits verwendet.<br />');
define('ADD_USERNAME', 'Willkommen! Du wurdest hinzugef&uuml;gt.');
define('ANSWER', 'Bitte gib die richtige Antwort an.<br />');
define('ALLR_LOGGED', 'Du bist eingeloggt und kannst dich nicht registieren.');
define('AUTONEWS_TITLE','Neuer Benutzer registriert.');
define('AUTONEWS_TEXT','Folgender Benutzer hat sich neu angemeldet: ');

//login.php
define('REGISTER', 'Registrieren');
define('LOGIN', 'Login');
define('NOUSER', 'Es wurde kein Benutzer mit den angegebenen Namen gefunden.');
define('WRONGPASSWORD', 'Das eingegebene Password ist ung&uuml;ltig.');
define('WELCOME', 'Willkommen ');
define('YOURROLE','Du bist ein ');
define('WHATACCESS',' und dieser Bereich ist freigegeben ab ');

//Rechte
define('WRONGRIGHTS','Du hast keinen Zugriff aufgrund fehlender Rechte oder weil du nicht angemeldet bist.');

//Adminbereich
define('ADMINSTART_HEADER','<h3>Administrationsbereich</h3>');
define('ADMINSTART_PANEL','Bitte w&auml;hle aus, was du machen m&ouml;chtest:');

define('USER_HEADER','<h3>Nutzer bearbeiten</h3>');
define('USERROLE_HEADER','Nutzerrollen bearbeiten');
define('USERROLE_CONFIRM','Aktualisieren');
define('USERROLE_REALNAME','<strong>Name</strong>');
define('USERROLE_NAME','<strong>Nutzername</strong>');
define('USERROLE_ROLE','<strong>Rolle</strong>');
define('ROLECHANGESAVED','<p style="text-align: center; color: red; font-size: 1.5em; font-weight: bold; margin: 0; padding: 0;">&Auml;nderungen wurden gespeichert.');
define('USERROLE_DEL_HEADER','Nutzer l&ouml;schen');
define('USERROLE_DEL_CONFIRM','L&ouml;schen');
define('USERDELETEDERROR', 'Der Nutzer kann nicht gel&ouml;scht werden, da er Administrator ist.');
define('USERDELETED', '<p style="text-align: center; color: red; font-size: 1.5em; font-weight: bold; margin: 0; padding: 0;">Der Nutzer wurde erfolgreich gel&ouml;scht.');
define('USER_INFO_HEADER', 'Hinweis');
define('USER_INFO', 'Ist eine Rolle leer, einmal Aktualisieren dr&uuml;cken.');

define('ACCESS_HEADER','<h3>Rollen bearbeiten</h3>');
define('ACCESSROLE_HEADER','Rollenzugriffe bearbeiten');
define('ACCESSROLE_CONFIRM','Aktualisieren');
define('ACCESSROLE_NAME','<strong>Rolle</strong>');
define('ACCESSROLE_ROLE','<strong>Wertigkeit</strong>');
define('ACCESSCHANGESAVED','<p style="text-align: center; color: red; font-size: 1.5em; font-weight: bold; margin: 0; padding: 0;">M&ouml;gliche &Auml;nderungen wurden gespeichert.');
define('ACCESSUPDATEERROR', '<p style="text-align: center; color: red; font-size: 1.5em; font-weight: bold; margin: 0; padding: 0;">Fehler: es d&uuml;rfen nur Zahlen von 1 bis 998 verwendet werden: ');
define('ACCESSROLE_ADDROLE_HEADER','Rolle hinzuf&uuml;gen');
define('ACCESSROLE_ADD_CONFIRM','Rolle hinzuf&uuml;gen');
define('ACCESSROLE_ADDROLE_NAME','Rollenname');
define('ACCESSROLE_ADDROLE_LEVEL','Wertigkeit');
define('NEWROLEERROR','Neue Rolle schon vorhanden, der Wertebereich ist keine Zahl oder nicht von 1 bis 998.');
define('NEWROLESAVED','<p style="text-align: center; color: red; font-size: 1.5em; font-weight: bold; margin: 0; padding: 0;">Neue Rolle wurde hinzugef&uuml;gt.');
define('ACCESSROLE_DELROLE_HEADER','Rolle l&ouml;schen');
define('ACCESSROLE_DEL_CONFIRM','L&ouml;schen');
define('ROLEDELETED','<p style="text-align: center; color: red; font-size: 1.5em; font-weight: bold; margin: 0; padding: 0;">Folgende Rolle wurde gel&ouml;scht: ');
define('ROLEDELETEDERROR','<p style="text-align: center; color: red; font-size: 1.5em; font-weight: bold; margin: 0; padding: 0;">Folgende Rolle kann nicht gel&ouml;scht werden: ');
define('NEWSCATCHANGESAVED','<p style="text-align: center; color: red; font-size: 1.5em; font-weight: bold; margin: 0; padding: 0;">M&ouml;gliche &Auml;nderungen wurden gespeichert.');

define('MODULES_HEADER','<h3>Module bearbeiten</h3>');
define('MODULES_INFO_HEADER','Wichtiger Hinweis');
define('MODULES_INFO','Die Zugriffsverwaltung funktioniert nur mit Module, welche mit der Funktion checkAccess($db) gepr&uuml;ft werden. Hinzuf&uuml;gen und Entfernen von Modulen erfolgt automatisch.');
define('MODULESROLE_HEADER','Module bearbeiten');
define('MODULE_CONFIRM','Aktualisieren');
define('MODULEROLE_FILE','<strong>Dateiname</strong>');
define('MODULEROLE_NAME','<strong>Beschreibung</strong>');
define('MODULEROLE_ROLE','<strong>Rolle</strong>');

define('COM_HEADER','<h3>Komponenten bearbeiten</h3>');
define('COM_INFO_HEADER','Wichtiger Hinweis');
define('COM_INFO','Die Zugriffsverwaltung funktioniert nur mit Komponenten, welche mit der Funktion checkAccess($db) gepr&uuml;ft werden. Hinzuf&uuml;gen und Entfernen von Komponenten erfolgt automatisch.');
define('COMROLE_HEADER','Komponenten bearbeiten');
define('COM_CONFIRM','Aktualisieren');
define('COMROLE_FILE','<strong>Dateiname</strong>');
define('COMROLE_NAME','<strong>Beschreibung</strong>');
define('COMROLE_ROLE','<strong>Rolle</strong>');

define('NEWSCAT_HEADER','<h3>Newskategorien bearbeiten</h3>');
define('NEWSCATROLE_HEADER','Newskategoriezugriffe bearbeiten');
define('NEWSCAT_NAME','<strong>Kategorie</strong>');
define('NEWSCAT_INFO','<strong>Beschreibung</strong>');
define('NEWSCAT_ROLE','<strong>Rolle</strong>');
define('NEWSCATROLE_CONFIRM','Aktualisieren');
define('NEWSCAT_ADDNEWSCAT_HEADER','Neue Newskategorie hinzuf&uuml;gen');
define('NEWSCAT_ADDNEWSCAT_CONFIRM','Newskategorie hinzuf&uuml;gen');
define('NEWSCATADD','<p style="text-align: center; color: red; font-size: 1.5em; font-weight: bold; margin: 0; padding: 0;">Folgende Kategorie wurde hinzuf&uuml;gt: ');
define('NEWSCATADDERROR','<p style="text-align: center; color: red; font-size: 1.5em; font-weight: bold; margin: 0; padding: 0;">Folgende Kategorie wurde nicht hinzuf&uuml;gt, da sie schon existiert: ');
define('NEWSCAT_ADDNEWSCAT_NAME','<strong>Newskategorie<strong>');
define('NEWSCAT_ADDNEWSCAT_LEVEL','<strong>Rolle</strong>');
define('NEWSCAT_DELNEWSCAT_HEADER','Newskategorie l&ouml;schen');
define('NEWSCAT_DEL_CONFIRM','L&ouml;schen');
define('NEWSINCAT','<p style="text-align: center; color: red; font-size: 1.5em; font-weight: bold; margin: 0; padding: 0;">L&ouml;schen nicht m&ouml;glich, da noch News dieser Kategorie zugeordnet sind.');
define('NEWSCATDELETED','<p style="text-align: center; color: red; font-size: 1.5em; font-weight: bold; margin: 0; padding: 0;">Newskategorie gel&ouml;scht.');

define('PARAMETER_HEADER','<h3>Parameter bearbeiten</h3>');
define('PARAEDIT_HEADER','Parametereigenschaften bearbeiten');
define('PARA_NAME','<strong>Parameterbezeichner</strong>');
define('PARA_INFO','<strong>Parameterinformation</strong>');
define('PARA_VALUE','<strong>Parameterwert</strong>');
define('PARAADD_HEADER','Parameter hinzuf&uuml;gen');
define('PARAADD_PARAMETER','Parameter');
define('PARAADD_INFO','Information');
define('PARAADD_VALUE','Wert');
define('PARA_ADD_CONFIRM','Parameter hinzuf&uuml;gen');
define('PARAADD_DEL','Parameter vor L&ouml;schen sch&uuml;tzen?');
define('PARAADD','<p style="text-align: center; color: red; font-size: 1.5em; font-weight: bold; margin: 0; padding: 0;">Folgender Parameter wurde hinzuf&uuml;gt: ');
define('PARAADDERROR','<p style="text-align: center; color: red; font-size: 1.5em; font-weight: bold; margin: 0; padding: 0;">Folgender Parameter existiert schon: ');
define('PARAMETER_DEL_HEADER','Parameter l&ouml;schen');
define('PARADELETED','<p style="text-align: center; color: red; font-size: 1.5em; font-weight: bold; margin: 0; padding: 0;">Parameter gel&ouml;scht.');

define('NAVI_HEADER','<h3>Navigation bearbeiten</h3>');
define('NAVIEDIT_HEADER','Navigationshierarchie bearbeiten');
define('NAVIROLEEDIT_HEADER','Navigationsrollen bearbeiten');
define('NAVI_NAME','<strong>Name</strong>');
define('NAVI_MODULE','<strong>Zugriff auf</strong>');
define('NAVI_PARENT','<strong>&Uuml;bergeordneter Men&uuml;punkt</strong>');
define('NAVI_ORDER','<strong>Reihenfolge</strong>');
define('NAVIEDITUPDATEERROR','<p style="text-align: center; color: red; font-size: 1.5em; font-weight: bold; margin: 0; padding: 0;">Ein Fehler ist aufgetreten: Namen d&uuml;rfen nur Buchstaben und Zahlen enthalten und die Priorit&auml;t nur Zahlen: ');
define('NAVIEDITCHANGESAVED','<p style="text-align: center; color: red; font-size: 1.5em; font-weight: bold; margin: 0; padding: 0;">Die Navigationshierarchie wurde mit fehlerlosen Datens&auml;tzen aktualisiert.');
define('NAVI_ROLE','<strong>Rolle</strong>');
define('NAVI_ACTIVE','<strong>Aktiviert</strong>');
define('NAVIADD_HEADER','Navigationsmen&uuml;punkt hinzuf&uuml;gen');
define('NAVIADD_NAME','Name des Men&uuml;punktes:');
define('NAVIADD_MODULE','Zugriff auf:');
define('NAVIADD_PARENT','&Uuml;bergeordneter Men&uuml;punkt:');
define('NAVIADD_PRIO','Reihenfolge:');
define('NAVIADD_ROLE','Rolle:');
define('NAVIADD_ACTIVE','Aktiver Men&uuml;punkt:');
define('NAVIADD_CONFIRM','Men&uuml;punkt hinzuf&uuml;gen');
define('NAVIADD_SAVED','<p style="text-align: center; color: red; font-size: 1.5em; font-weight: bold; margin: 0; padding: 0;">Folgender Men&uuml;punkt wurde hinzuf&uuml;gt: ');
define('NAVIDEL_HEADER','Men&uuml;punkt l&ouml;schen');
define('NAVI_DEL_CONFIRM','Men&uuml;punkt l&ouml;schen');
define('NAVIDEL_SAVED','<p style="text-align: center; color: red; font-size: 1.5em; font-weight: bold; margin: 0; padding: 0;">Der gew&auml;hlte Men&uuml;punkt wurde gel&ouml;scht.');

//Newskomponente
//News hinzuf&uuml;gen
define('NEWSINSERT_HEADER','<h3>News eintragen</h3>');
define('NEWSINSERT_SUBHEADER','Neuer Eintrag');
define('NEWSINSERT_CONFIRM','News hinzuf&uuml;gen');
define('NEWSINSERT_NAME','<strong>Name:</strong> <i>(nicht &auml;nderbar)</i>');
define('NEWSINSERT_CAT','<strong>Kategorie:</strong>');
define('NEWSINSERT_TITLE','<strong>Titel:</strong>');
define('NEWSINSERT_DONE','<center><h2>Artikel wurde gespeichert</h2></center>');

//Startnews
define('NEWS_FILTER_CAT','News filtern nach Kategorie ');
define('NEWS_FILTER_ROLE',' oder nach Zugriff ');
define('NEWS_FILTER_ALL','Alle News');
define('WRITTEN_BY','Geschrieben von ');
define('WRITTEN_TIME',', ');
define('FILTER_CONFIRM','Filter setzen');
define('NEWSEDITLINK','[bearbeiten]');
define('NEWSDELLINK','[l&ouml;schen]');

//News bearbeiten
define('NEWSEDIT_HEADER','<h3>News bearbeiten</h3>');
define('NEWSEDIT_SUBHEADER','Bearbeiten');
define('NEWSEDIT_CONFIRM','&Auml;nderung speichern');
define('NEWSEDIT_NAME','<strong>Name:</strong> <i>(nicht &auml;nderbar)</i>');
define('NEWSEDIT_CAT','<strong>Kategorie:</strong>');
define('NEWSEDIT_TITLE','<strong>Titel:</strong>');
define('NEWSEDIT_DONE','<center><h2>Artikel wurde gespeichert</h2></center>');
define('NEWSEDITSAVED','<p style="text-align: center; color: red; font-size: 1.5em; font-weight: bold; margin: 0; padding: 0;">News wurden aktualisiert.');

//News l&ouml;schen
define('NEWSDEL_HEADER','<h3>News l&ouml;schen</h3>');
define('NEWSDEL_SUBHEADER','L&ouml;schen best&auml;tigen');
define('NEWSDEL_CONFIRM','L&ouml;schen');
define('DELCONFIRMED','<p style="text-align: center; color: red; font-size: 1.5em; font-weight: bold; margin: 0; padding: 0;">Eintrag wurde gel&ouml;scht.');

//Bibliotheken
define('LIBMGTSTART_HEADER','<h3>Bibliotheksverwaltungsbereich</h3>');
define('LIBMGTSTART_PANEL','Bitte w&auml;hle aus, was du machen m&ouml;chtest:');

//Bibliothek hinzuf&uuml;gen
define('LIBADD_HEADER','<h3>Neue Bibliothek erstellen</h3>');
define('LIBADD_SUBHEADER1','Grunddaten der Bibliothek');
define('LIBADD_SUBHEADER2','Standort der Bibliothek');
define('LIBADD_SUBHEADER3','Erreichbarkeit des Besitzers');
define('LIBADD_CONFIRM','Bibliothek erstellen');
define('LIBADD_NAME','<strong>Name:</strong>');
define('LIBADD_ROLE','<strong>Zugriff ab:</strong>');
define('NEWLIB_NAME','Neue Bibliothek...');
define('NEWLIB_INFO','Beschreibe mich!');
define('LIBADD_STREET','<strong>Stra&szlig;e:</strong>');
define('LIBADD_STREET_NO','<strong>Hausnummer:</strong>');
define('LIBADD_CITY','<strong>Stadt:</strong>');
define('LIBADD_ZIP','<strong>PLZ:</strong>');
define('LIBADD_COUNTRY','<strong>Land:</strong>');
define('LIBADD_PHONE','<strong>Telefon:</strong>');
define('LIBADD_PHONE_MOBILE','<strong>Mobilfunktelefon:</strong>');
define('LIBADD_FAX','<strong>Fax:</strong>');
define('LIBADD_EMAIL','<strong>E-Mail:</strong>');
define('LIBADD_OWNER','<strong>Besitzer:</strong>');
define('LIBADD_INFO','<strong>Beschreibung:</strong>');
define('LIBADD_DONE','<center><h2>Bibliothek wurde angelegt.</h2></center>');
define('AUTONEWS_LIBADDTITLE','Neue Bibliothek erstellt: ');
define('AUTONEWS_LIBADDTEXT','Folgender Benutzer hat eine neue Bibliothek erstellt: ');

//Bibliothek bearbeiten
define('LIBEDIT_HEADER','<h3>Bibliothek bearbeiten</h3>');
define('LIBEDIT_SUBHEADER1','Grunddaten der Bibliothek');
define('LIBEDIT_SUBHEADER2','Standort der Bibliothek');
define('LIBEDIT_SUBHEADER3','Erreichbarkeit des Besitzers');
define('LIBEDIT_SUBHEADER4','Bibliothek ausw&auml;hlen');
define('LIBCHOSE_CONFIRM','Ausw&auml;hlen');
define('LIBEDIT_CONFIRM','Bibliothek aktualisieren');
define('LIBEDIT_NAME','<strong>Name:</strong>');
define('LIBEDIT_ROLE','<strong>Zugriff ab:</strong>');
define('LIBEDIT_STREET','<strong>Stra&szlig;e:</strong>');
define('LIBEDIT_STREET_NO','<strong>Hausnummer:</strong>');
define('LIBEDIT_CITY','<strong>Stadt:</strong>');
define('LIBEDIT_ZIP','<strong>PLZ:</strong>');
define('LIBEDIT_COUNTRY','<strong>Land:</strong>');
define('LIBEDIT_PHONE','<strong>Telefon:</strong>');
define('LIBEDIT_PHONE_MOBILE','<strong>Mobilfunktelefon:</strong>');
define('LIBEDIT_FAX','<strong>Fax:</strong>');
define('LIBEDIT_EMAIL','<strong>E-Mail:</strong>');
define('LIBEDIT_OWNER','<strong>Besitzer:</strong>');
define('LIBEDIT_INFO','<strong>Beschreibung:</strong>');
define('LIBEDIT_DONE','<center><h2>Bibliothek wurde aktualisiert.</h2></center>');

//Bibliothek l&ouml;schen
define('LIBDEL_HEADER','<h3>Bibliothek l&ouml;schen</h3>');
define('LIBDEL_SUBHEADER','L&ouml;schen');
define('LIBDEL_CONFIRM','Auswahl l&ouml;schen');
define('LIBDEL_NAME','<strong>Bibliothek</strong>');
define('AUTONEWS_LIBDELTITLE','Eine Bibliothek wurde gel&ouml;scht.');
define('AUTONEWS_LIBDELTEXT','Folgende Bibliothek wurde gel&ouml;scht: ');

//Bibliothekstruktur
define('LIBLOCEDIT_HEADER','<h3>Lagerortstruktur</h3>');
define('LIBLOCEDIT_SUBHEADER1','Lagerort ausw&auml;hlen');
define('LIBLOCEDIT_SUBHEADER2','Struktur ausw&auml;hlen');
define('LIBLOCEDIT_SUBHEADER3','Struktur bearbeiten');
define('LIBLOCEDIT_SUBHEADER4','Struktur erweitern');
define('LIBLOCEDIT_SUBHEADER5','Derzeitige Struktur');
define('LIBLOCCHOSE_CONFIRM','Ausw&auml;hlen');
define('REFRESH_CONFIRM','->');
define('REFRESHLIB_CONFIRM','->');
define('LIBLOCEDIT_CONFIRM','Aktualisieren');
define('LIBLOCNEW_FLOOR','Neue Etage ...');
define('LIBLOCNEW_ROOM','Neuer Raum ...');
define('LIBLOCNEW_RACK','Neues Regal ...');
define('LIBLOCNEW_CONFIRM','Hinzuf&uuml;gen');

//Ausleiher
define('BORROWER_HEADER','<h3>Liste der Ausleiher</h3>');
define('BORROWER_SUBHEADER1','Ausleiher hinzuf&uuml;gen');
define('BORROWER_SUBHEADER2','Von vorhandenen Nutzer kopieren');
define('BORROWER_SUBHEADER3','Ausleiher bearbeiten');
define('BORROWER_ADD_CONFIRM','Hinzuf&uuml;gen');
define('BORROWER_COPY_CONFIRM','Kopieren');
define('BORROWER_EDIT_CONFIRM','Aktualisieren');
define('BORROWERCHOSE_EDIT_CONFIRM','Ausw&auml;hlen');
define('BORROWER_ADD_NAME','<strong>Name:</strong>');
define('BORROWER_ADD_EMAIL','<strong>E-Mail:</strong>');
define('BORROWER_ADD_PHONE','<strong>Telefon:</strong>');
define('BORROWER_ADD_PHONE_MOBILE','<strong>Mobilfunktelefon:</strong>');
define('BORROWER_ADD_INFO','<strong>Zusatzinformationen:</strong>');

//Artikelverwaltung
define('ITEMMGTSTART_HEADER','<h3>Artikelverwaltungsbereich</h3>');
define('ITEMMGTSTART_PANEL','Bitte w&auml;hle aus, was du machen m&ouml;chtest:');

//Artikel hinzuf&uuml;gen
define('ITEMADD_HEADER','<h3>Artikel hinzuf&uuml;gen</h3>');
define('ITEMADD_SUBHEADER1','Hinzuf&uuml;gen via Stichwort/ISBN/EAN');
define('ITEMADD_SUBHEADER3','Artikel manuell eintragen');
define('ITEMADD_SUBHEADER2',' Ergebnisse');
define('ITEMADD_SUBHEADER4','Lagerort ausw&auml;hlen (wird automatisch f&uuml;r weitere Artikel &uuml;bernommen)');
define('ITEMADD_EAN_FILL','Suchbegriff(e)');
define('ITEMADD_EAN_CONFIRM','Suche ...');
define('ITEMADD_CONFIRM','Artikel hinzuf&uuml;gen');
define('ITEMADD_FORWARD','N&auml;chste Seite');
define('ITEMADD_BACKWARD','Vorhergehende Seite');
define('ITEMADD_CAT','Kategorie: ');
define('ITEMADD_TITLE','Titel: ');
define('ITEMADD_AUTHOR0','Autor: ');
define('ITEMADD_CREATOR','Ersteller: ');
define('ITEMADD_PUBLISHER','Herausgeber: ');
define('ITEMADD_LABEL','Verlag: ');
define('ITEMADD_EDITION','Auflage: ');
define('ITEMADD_BINDING','Ausgabe: ');
define('ITEMADD_PUBDATE','Erscheinungsdatum: ');
define('ITEMADD_NUMPAGES','Seitenzahl: ');
define('ITEMADD_FEATURE','Feature(s): ');
define('ITEMADD_KEYWORDS','Schl&uuml;sselw&ouml;rter: ');
define('ITEMADD_PRICE','Preis: ');
define('ITEMADD_CURR','W&auml;hrung: ');
define('ITEMADD_DESCR','Kurzbeschreibung: ');
define('ITEMADD_ADESCR','Autoreninfo: ');
define('ITEMADD_ISBN','ISBN/EAN: ');
define('ITEMADD_ASIN','ASIN: ');
define('ITEMADD_OWNCODE','Eigene Referenz: ');
define('ITEMADD_ADDED', '<p style="text-align: center; color: red; font-size: 1.5em; font-weight: bold; margin: 0; padding: 0;">Artikel wurde hinzugef&uuml;gt!');

//Artikel verwalten
define('ITEMEDIT_HEADER','<h3>Artikel verwalten</h3>');
define('ITEMEDIT_SUBHEADER1','Artikel suchen');
define('ITEMEDIT_SUBHEADER2','Ergebnisliste');
define('ITEMEDIT_KEYWORDS','Schl&uuml;sselbegriff(e): ');
define('ITEMEDIT_SEARCH','Suchen...');
define('ITEMEDIT_SEARCHCOUNT','Anzahl der Treffer: ');
define('ITEMEDIT_DELITEM','[X]');
define('ITEMEDIT_EDITITEM','[bearbeiten]');
define('ITEMEDIT_GIVEITEM','[verleihen]');
define('ITEMEDIT_GETITEM','[zur&uuml;cknehmen]');
define('ITEMEDIT_MOVEITEM','[verschieben]');

//Artikel bearbeiten
define('ITEMEDIT_EDITHEADER','<h3>Artikel bearbeiten</h3>');
define('ITEMEDIT_EDITSUBHEADER1','Folgenden Artikel bearbeiten: ');
define('ITEMEDIT_EDITCONFIRM','Artikel speichern!');
define('ITEMEDIT_EDITDONE', '<p style="text-align: center; color: red; font-size: 1.5em; font-weight: bold; margin: 0; padding: 0;">Artikel gespeichert!');
define('ITEMEDIT_EDITNO','Bearbeiten nicht m&ouml;glich: Artikel existiert nicht oder kein Zugriff erlaubt.');
define('ITEMEDIT_EDITGOTOSEARCH','Zur&uuml;ck zur Suche');

//Artikel löschen
define('ITEMDEL_HEADER','<h3>Artikel l&ouml;schen</h3>');
define('ITEMDEL_SUBHEADER1','Folgenden Artikel l&ouml;schen: ');
define('ITEMDEL_CONFIRM','Artikel endg&uuml;ltig l&ouml;schen!');
define('ITEMDEL_DONE', '<p style="text-align: center; color: red; font-size: 1.5em; font-weight: bold; margin: 0; padding: 0;">Artikel wurde gel&ouml;scht!');
define('ITEMDEL_NO','L&ouml;schen nicht m&ouml;glich: Artikel existiert nicht oder kein Zugriff erlaubt.');
define('ITEMDEL_GOTOSEARCH','Zur&uuml;ck zur Suche');

//Artikel bewegen
define('ITEMEDIT_LOCHEADER','<h3>Lagerort &auml;ndern</h3>');
define('ITEMEDIT_LOCSUBHEADER1','Derzeitige Lagerort');
define('ITEMEDIT_LOCSUBHEADER2','Neuer Lagerort zur Bearbeitung: ');
define('ITEMEDIT_LOCCHOSEN','<i>Derzeit ausgew&auml;hlter Lagerort:</i> ');
define('ITEMEDIT_LOCCONFIRM','Lagerort &auml;ndern');

//Artikel verleihen
?>