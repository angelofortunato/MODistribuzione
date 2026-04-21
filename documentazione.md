# Documentazione Progetto: MO Distribuzione

Questo documento illustra l'architettura, le funzionalità implementate e il flusso logico del progetto **MO Distribuzione**, basato sul framework PHP **Laravel**. 

L'applicazione è strutturata come un portale B2B / E-commerce in cui gli utenti registrati possono visualizzare un listino, aggiungere prodotti al carrello e simulare acquisti, mentre gli amministratori possono gestire il catalogo prodotti, verificare gli utenti registrati e consultare gli ordini.

---

## 1. Ruoli e Accessi

Il sistema distingue principalmente tra due tipologie di utenti, discriminati dal campo booleano `is_admin` nella tabella `users`:

- **Utente Standard (`is_admin = 0`)**: Può registrarsi, accedere al sito, visualizzare il listino, aggiungere prodotti al carrello, inoltrare "ordini" (simulazione di acquisto) e gestire il proprio profilo.
- **Amministratore (`is_admin = 1`)**: Ha accesso a un pannello di controllo dedicato (`/admin`) dal quale può creare/modificare/eliminare i prodotti, visualizzare l'elenco degli ordini ricevuti, gestire gli utenti iscritti (es. attivare/disattivare l'account o visualizzare la visura camerale).

---

## 2. Funzionalità Implementate

### Autenticazione e Gestione Account
- **Registrazione & Login**: Gestite dai controller `RegistrationController` e `LoginController`. L'utente può registrarsi inserendo dati aziendali (Partita IVA, Ragione Sociale, caricamento Visura Camerale).
- **Profilo Utente**: L'utente può visualizzare i propri dati e modificare la password di accesso.

### Esperienza Utente (Front-end B2B)
- **Home Page / Listino**: Mostra i prodotti disponibili. Gli utenti possono cercare prodotti specifici (supportato anche da un endpoint di autocomplete).
- **Dettaglio Prodotto**: Pagina singola dedicata al prodotto selezionato.
- **Carrello**: Sistema di carrello (`CartController`) gestito in sessione o tramite database. L'utente può aggiungere prodotti, rimuoverli e completare l'ordine ("Simula Acquisto").

### Pannello di Amministrazione (Back-end)
- **Dashboard Amministratore**: Schermata riepilogativa dell'andamento.
- **Gestione Prodotti (CRUD)**: Possibilità di visualizzare l'elenco dei prodotti, crearne di nuovi con immagine (`prodotto/crea`), modificarli o eliminarli.
- **Gestione Utenti**: Tabella riassuntiva di tutti gli iscritti. L'amministratore può "congelare" un account (toggle-active), eliminarlo o visionarne la visura camerale (`admin/visura/{user}`).
- **Gestione Ordini**: Schermata in cui sono raggruppati gli ordini effettuati dagli utenti (`ProductUserController`).

---

## 3. Mappatura Rotte, Controller e Viste

Di seguito viene illustrato come i vari URL intercettano le richieste HTTP, a quali Controller vengono indirizzati e quali file `.blade.php` (Viste) vengono renderizzati per mostrare l'interfaccia.

### 🔐 Autenticazione
| Rotta (URL) | Metodo | Controller @ Metodo | Vista Blade |
| :--- | :--- | :--- | :--- |
| `/login` | GET | (Mostra form login) | `login.blade.php` |
| `/login` | POST | `LoginController@authenticate` | (Redirect in base al ruolo) |
| `/register` | GET | (Mostra form registrazione) | `registration.blade.php` |
| `/register` | POST | `RegistrationController@register` | (Redirect al login/home) |
| `/logout` | POST | `LoginController@logout` | (Redirect home) |

### 👤 Area Utente (Pubblica / Autenticata)
| Rotta (URL) | Metodo | Controller @ Metodo | Vista Blade |
| :--- | :--- | :--- | :--- |
| `/` (Home) | GET | `ProductController@indexUser` | `welcome.blade.php` |
| `/listino` | GET | `ProductController@showListino` | `listinoUser.blade.php` |
| `/listino/products/{id}` | GET | `ProductController@showProduct` | `prodottoShow.blade.php` |
| `/profilo` | GET | - | `profilo.blade.php` |
| `/profilo/modifica-password` | GET | - | `modificaPass.blade.php` |
| `/user/update-password` | POST | `UserController@updatePassword` | (Redirect) |

### 🛒 Carrello
| Rotta (URL) | Metodo | Controller @ Metodo | Vista Blade |
| :--- | :--- | :--- | :--- |
| `/cart` | GET | `CartController@index` | `cart.blade.php` |
| `/cart/add` | POST | `CartController@add` | (Redirect carrello) |
| `/cart/remove/{id}` | GET | `CartController@removeFromCart` | (Redirect carrello) |
| `/cart/simulate-purchase`| POST | `CartController@simulatePurchase`| (Redirect/Successo) |

### ⚙️ Pannello Amministratore (Prefisso base `/admin` & co.)
| Rotta (URL) | Metodo | Controller @ Metodo | Vista Blade |
| :--- | :--- | :--- | :--- |
| `/admin` | GET | `AdminDashboardController@index` | `admin/index.blade.php` |
| `/prodotti` | GET | `ProductController@prodotti` | `admin/prodotti.blade.php` |
| `/prodotto/crea` | GET | `ProductController@create` | `admin/createProduct.blade.php`|
| `/prodotto/crea` | POST | `ProductController@store` | (Redirect a `/prodotti`) |
| `/products/{id}` | GET | `ProductController@show` | `admin/show.blade.php` |
| `/products/{id}/edit` | GET | `ProductController@edit` | `admin/editProduct.blade.php` |
| `/products/{id}` | PUT | `ProductController@update` | (Redirect a `/prodotti`) |
| `/products/{id}` | DELETE | `ProductController@destroy` | (Redirect a `/prodotti`) |
| `/utenti` | GET | `UserController@utenti` | `admin/utenti.blade.php` |
| `/utenti/{id}` | GET | `UserController@show` | `admin/showUser.blade.php` |
| `/utenti/{id}` | DELETE | `UserController@destroy` | (Redirect a `/utenti`) |
| `/utenti/{id}/toggle-active`| POST | `UserController@toggleActive` | (Redirect) |
| `/admin/visura/{user}` | GET | `AdminController@servePdf` | (Download PDF) |
| `/ordini` | GET | `ProductUserController@index` | `admin/product_user.blade.php` |

### 🛠️ API & Endpoint Accessori
| Rotta (URL) | Metodo | Controller @ Metodo | Funzione |
| :--- | :--- | :--- | :--- |
| `/autocomplete` | GET | `ProductController@autocomplete` | Ricerca prodotti nel db (JSON) |
| `/generate-products/{n}` | GET | `ProductController@generateProducts` | Genera N prodotti fittizi |
| `/generate-users/{n}` | GET | `UserController@generateUsers` | Genera N utenti fittizi |

---

## 4. Architettura File e Flusso dei Dati

Il flusso standard (MVC) dell'applicazione è il seguente:
1. **Route (`web.php`)**: Intercetta la richiesta inviata dal browser del client.
2. **Controller (`app/Http/Controllers/`)**: Contiene la logica di business. Esegue interrogazioni al database richiamando i Model (es. `Product`, `User`) utilizzando Eloquent ORM. 
3. **View (`resources/views/`)**: Il Controller ritorna una risorsa Blade passando un array di dati. La Vista si occupa di renderizzare l'HTML inserendo dinamicamente le variabili (es. mostrando un foreach di `$products`).
4. **Vite.js & Tailwind/CSS**: Il progetto utilizza `Vite.js` per la compilazione degli asset (JavaScript e CSS/Tailwind) assicurando performance e un hot-reload dinamico in fase di sviluppo. Le viste dipendono fortemente dalle inclusioni come `@vite(['resources/css/app.css', 'resources/js/app.js'])`.
