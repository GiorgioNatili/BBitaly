BBitaly
========

BBitaly booking engine

## Configuring Netbeans

Effettuare il checkoout del repository (senza modificare il nome della cartella di destinazione):

```bash
git clone git@github.com:GiorgioNatili/BBitaly.git bbitaly
```

### Prerequisiti

Accertatevi di avere i seguenti plugin su NetBeans:

 * Hibernate
 * Maven
 * Git
 * Java
 * Spring
 * Java persistence
 * RESTfull Web Service

a loro volta si tireranno dietro un tot di dipendenze.

### Option 1: Create a new project

In NetBeans scegliere _File_ e quindi _New project_. Creare un progetto *Java Web* scegliendo quindi *Web Application with Existing Surces*. In *Location* indicare la cartella da cui si è effettuato il checkout 
precedententemente, lasciare gli altri parametri come vengono impostati automaticamente.

### Option 2: Import existing project

Potrebbe essere che vi indichi che esiste già un progetto NetBeans nella cartella, se così fosse annullare l'operazione corrente e scegliete _File_ e quindi _Open project_. A questo punto scegliete la cartella da 
cui avete effettuato il checkout.

### Configuring Tomcat

In entrambi i casi potrebbe dirvi che non avete Tomcat funzionante e configurato su NetBeans, nel qual caso ditegli di ignorare.

Al termine della creazione del progetto procedete all'installazione di Tomcat sul vostro sistema operativo e configurate NetBeans per utilizzarlo. Le modalità cambiano in base al sistema operativo su cui vi 
trovate, per Linux Ubuntuho seguito la seguente guida:

 * http://razius.com/2012/01/installing-and-adding-an-external-tomcat-server-in-netbeans/

A questo punto andante in NetBeans all'interno del progetto importato e nella Tab *Services* cliccate con il tasto destro su *Servers* e scegliete Add Servers. Qui scegliete Tomcat e specificate i parametri della 
vostra installazione di Tomcat.

## Configuring MySQL

Create un nuovo utente con password ed un relativo schema a cui ha accesso, caricatevi quindi il DUMP del DB dell'applicazione.

## Configuring application

Nel progetto creato/importato precedentemente in NetBeans aprite la cartella *Web Pages* quindi la cartella *WEB-INF*. All'interno vi troverete un file *jdbs.proprieties*, editate i parametri di connessione come 
esemplificato.

A questo punto potete procedere a fare bulizia del worspace ed ad effettuare la build dell'applicazione, scegliete quindi dal menu *Run* e quindi *Clean and Build Main Project*, questo cancellerà le vecchie 
dipendenze (che al primo avvio sono comunque mancanti) e scaricherà tutte le dipendenze necessarie. Potrebbero esservi delle dipendenze non risolte sulle connessioni MySQL ma NetBEans dovrebbe risolverle 
automaticamente avendo configurato il driver JDBC.

A questo punto potete avviare l'applicazione premento sul pulsante *Run*, vi verrà aperta una pagina che restituirà un error, non essendo presente un entry point di default. Fatto questo provate a visualizzare la 
pagina /status che dovrebbe rispondervi con un JSON in cui lo status è TRUE. A questo punto l'applicazione è installata e correttamente funzionante.
