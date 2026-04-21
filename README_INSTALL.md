# Guida all'Installazione e Configurazione

Questa guida illustra tutti i passaggi necessari per installare da zero o riprendere lo sviluppo di **MO Distribuzione** su una nuova macchina. Il progetto utilizza **Docker** e **Docker Compose** per l'infrastruttura (PHP, Nginx, MySQL, Redis).

---

## 1. Prerequisiti
Assicurati di avere installati sul tuo computer:
- [Docker Desktop](https://www.docker.com/products/docker-desktop)
- [Node.js e NPM](https://nodejs.org/) (necessari per compilare gli asset del frontend tramite Vite)
- Git

## 2. Inizializzazione del Progetto

Una volta clonato o aperto il progetto per la prima volta, la cartella potrebbe non contenere le tue configurazioni personali (es. il file `.env`).

### 2.1 Configurazione dell'Ambiente
Se il file `.env` non è presente, duplica il file di esempio:
```bash
cp .env.example .env
```
*(Assicurati che nel `.env` i parametri del database corrispondano a quelli indicati nel `docker-compose.yml`, ovvero `DB_HOST=mysql`, `DB_PORT=3306`, `DB_DATABASE=mo_distribuzione`, `DB_USERNAME=default`, `DB_PASSWORD=secret`)*.

### 2.2 Avvio dei Container Docker
Accendi l'ambiente Docker in background scaricando e costruendo le immagini necessarie:
```bash
docker compose up -d --build
```

### 2.3 Installazione Dipendenze Backend (PHP/Laravel)
Utilizza Composer direttamente all'interno del container PHP per scaricare tutte le dipendenze:
```bash
docker exec mo-dis-php composer install
```

### 2.4 Generazione della Chiave di Sicurezza
Genera l'Application Key di Laravel (se non è già presente nel `.env`):
```bash
docker exec mo-dis-php php artisan key:generate
```

## 3. Configurazione del Database e dei File

### 3.1 Creazione Tabelle e Dati Fittizi
Avvia le migrazioni del database e popola le tabelle con i dati fittizi di prova (tra cui l'amministratore e i prodotti):
```bash
docker exec mo-dis-php php artisan migrate:fresh --seed
```
*(Nota: usa `migrate` al posto di `migrate:fresh` se vuoi solo aggiornare le tabelle senza cancellare i dati esistenti).*

### 3.2 Collegamento Immagini e Storage
Affinché le immagini caricate (es. foto prodotti, visure) siano visibili pubblicamente, crea il symlink della cartella storage:
```bash
docker exec mo-dis-php php artisan storage:link
```

### 3.3 Permessi delle Cartelle (Speciale per Windows)
Su Windows i volumi Docker potrebbero causare errori di "Permission Denied". Assegna i permessi di scrittura alle cartelle di log e cache:
```bash
docker exec -u root mo-dis-php chmod -R 777 storage bootstrap/cache
```

## 4. Installazione Dipendenze Frontend e Compilazione (Vite)

Laravel 10 utilizza **Vite** per compilare JavaScript e CSS. Questi comandi vanno eseguiti **dal tuo terminale locale** (non dentro il container Docker).

Installa le dipendenze Javascript (Vue/Tailwind/Axios):
```bash
npm install
```

Avvia il server di sviluppo per l'Hot Reloading (lascialo in esecuzione in una finestra del terminale mentre lavori):
```bash
npm run dev
```

Se invece devi mettere il sito in "produzione" e non ti serve l'hot reloading, puoi compilare gli asset una volta sola con:
```bash
npm run build
```

---

## 🎉 Fine! Il sito è pronto.
A questo punto l'applicazione è funzionante. Puoi accedere a:
- **Sito Web**: [http://localhost:8080](http://localhost:8080)
- **Utente Amministratore (generato dal seeder)**:
  - **Email**: `admin@admin.com` (se l'hai mantenuto) o l'email generata dal tuo seeder.
  - **Password**: `password`
