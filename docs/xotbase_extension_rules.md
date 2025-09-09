<<<<<<< HEAD
# Regole di Estensione XotBase per Filament

## Regola Fondamentale

**NON estendere MAI classi Filament direttamente**

Tutte le classi Filament devono essere estese tramite classi astratte XotBase che replicano la struttura originale.

## Pattern Corretto

### ❌ SBAGLIATO
```php
use Filament\Pages\Dashboard;

class MyDashboard extends Dashboard
{
    // ERRORE: estensione diretta di classe Filament
}
```

### ✅ CORRETTO
```php
use Modules\Xot\Filament\Pages\XotBaseDashboard;

class MyDashboard extends XotBaseDashboard
{
    // CORRETTO: estensione tramite XotBase
}
```

## Mappatura Classi Comuni

| Classe Filament Originale | Classe XotBase da Usare |
|---------------------------|-------------------------|
| `Filament\Pages\Dashboard` | `Modules\Xot\Filament\Pages\XotBaseDashboard` |
| `Filament\Resources\Resource` | `Modules\Xot\Filament\Resources\XotBaseResource` |
| `Filament\Resources\Pages\ListRecords` | `Modules\Xot\Filament\Resources\Pages\XotBaseListRecords` |
| `Filament\Resources\Pages\CreateRecord` | `Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord` |
| `Filament\Resources\Pages\EditRecord` | `Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord` |
| `Filament\Widgets\Widget` | `Modules\Xot\Filament\Widgets\XotBaseWidget` |

## Motivazioni Architetturali

### 1. Centralizzazione
- Funzionalità comuni implementate una sola volta
- Controllo centralizzato dell'architettura
- Prevenzione di duplicazioni di codice

### 2. Manutenibilità
- Modifiche globali tramite classi XotBase
- Coerenza tra tutti i moduli
- Facilità di debugging e testing

### 3. Estensibilità
- Override centralizzato di comportamenti Filament
- Aggiunta di funzionalità custom a livello sistemico
- Integrazione con altri componenti del framework

## Implementazione nel Modulo Employee

Tutti i componenti Filament del modulo Employee seguono questa regola:

- `Dashboard.php` estende `XotBaseDashboard`
- Future risorse estenderanno `XotBaseResource`
- Future pagine estenderanno le rispettive classi XotBase

## Collegamento alla Documentazione Generale

Per regole architetturali generali, consultare:
- [Documentazione Xot - Architettura Filament](../../Xot/docs/filament_architecture.md)
- [Regole Generali di Sviluppo](../../Xot/docs/development_rules.md)

## Controlli di Qualità

Prima di ogni commit, verificare che:
1. Nessuna classe estenda direttamente classi Filament
2. Tutti gli import puntino a classi XotBase
3. La struttura del namespace sia coerente
4. **Nessuna classe che estende XotBaseDashboard ridefinisca proprietà di navigazione**
5. Le dashboard siano completamente vuote e lascino gestire tutto a XotBaseDashboard

## Esempi di Correzione

### Prima (ERRATO)
```php
namespace Modules\Employee\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;

class Dashboard extends BaseDashboard
{
    use HasFiltersForm;
    // ...
}
```

### Dopo (CORRETTO)
```php
namespace Modules\Employee\Filament\Pages;

use Modules\Xot\Filament\Pages\XotBaseDashboard;

/**
 * Dashboard per il modulo Employee.
 * 
 * Estende XotBaseDashboard che gestisce automaticamente:
 * - Navigazione (icon, title, label, sort)
 * - Filtri del dashboard
 * - Struttura base del dashboard
 */
class Dashboard extends XotBaseDashboard
{
    // ❌ NON ridefinire proprietà di navigazione:
    // protected static ?string $navigationIcon
    // protected static ?string $title
    // protected static ?string $navigationLabel  
    // protected static ?int $navigationSort
    
    // ✅ XotBaseDashboard gestisce tutto automaticamente
}
```

## Regole Specifiche per XotBaseDashboard

### ❌ NON Ridefinire Mai

Le seguenti proprietà sono **gestite centralmente** da XotBaseDashboard:

```php
// ❌ VIETATO - Già gestito dalla classe base
protected static ?string $navigationIcon = 'heroicon-o-users';
protected static ?string $title = 'Employee Dashboard';
protected static ?string $navigationLabel = 'Employee';
protected static ?int $navigationSort = 1;
```

### ✅ Pattern Corretto

```php
class Dashboard extends XotBaseDashboard
{
    // Classe completamente vuota
    // XotBaseDashboard auto-configura tutto basandosi sul modulo
}
```

### Motivazioni Architetturali

1. **Auto-configurazione**: XotBaseDashboard deduce automaticamente icon, title e label dal nome del modulo
2. **Centralizzazione**: Tutte le dashboard hanno comportamento uniforme
3. **DRY Principle**: Evita duplicazione di codice di navigazione
4. **Manutenibilità**: Modifiche globali dalla classe base
5. **Consistenza**: Stesso aspetto e comportamento tra tutti i moduli
=======
# XotBase Extension Rules for Employee Module

## Core Principle

**NEVER extend Filament classes directly. ALWAYS extend XotBase classes.**

This is the fundamental rule of Laraxot philosophy that must be followed without exception.

## Correct Extension Patterns

### Filament Resource Pages
- ❌ NEVER: `extends Filament\Resources\Pages\CreateRecord`
- ✅ ALWAYS: `extends Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord`

- ❌ NEVER: `extends Filament\Resources\Pages\EditRecord`  
- ✅ ALWAYS: `extends Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord`

- ❌ NEVER: `extends Filament\Resources\Pages\ListRecords`
- ✅ ALWAYS: `extends Modules\Xot\Filament\Resources\Pages\XotBaseListRecords`

### Filament Resources
- ❌ NEVER: `extends Filament\Resources\Resource`
- ✅ ALWAYS: `extends Modules\Xot\Filament\Resources\XotBaseResource`

### Filament Widgets
- ❌ NEVER: `extends Filament\Widgets\Widget`
- ✅ ALWAYS: `extends Modules\Xot\Filament\Widgets\XotBaseWidget`

### Filament Pages
- ❌ NEVER: `extends Filament\Pages\Page`
- ✅ ALWAYS: `extends Modules\Xot\Filament\Pages\XotBasePage`

## CRITICAL: Method Signature Compatibility

### Method Visibility Requirements
**MANDATORY RULE**: All method implementations in traits and concrete classes extending XotBase MUST match the exact signature of the base class methods.

#### Static vs Non-Static Requirements
```php
// NavigationPageLabelTrait - MUST match XotBasePage signatures
public static function getModelLabel(): string  // STATIC required
{
    return static::trans('navigation.name');
}

public static function getPluralModelLabel(): string  // STATIC required
{
    return static::trans('navigation.plural');
    }
}
```

### ViewRecord
```php
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewWorkHour extends XotBaseViewRecord
{
    protected static string $resource = WorkHourResource::class;

    /**
     * Get the infolist schema for the view page.
     * Required by XotBaseViewRecord abstract method.
     *
     * @return array<int, \Filament\Infolists\Components\Component>
     */
    protected function getInfolistSchema(): array
    {
        return [
            // Schema dell'infolist...
        ];
    }
}
```

## Checklist Pre-Implementazione Filament

Prima di creare qualsiasi classe Filament in Employee Module, verificare SEMPRE:

- [ ] **Estensione Corretta**: La classe estende la classe XotBase appropriata
- [ ] **Metodi Astratti**: Implementare TUTTI i metodi astratti della classe base
- [ ] **Staticità Metodi**: Mantenere la stessa staticità dei metodi ereditati
- [ ] **Metodi Statici Richiesti**: Verificare disponibilità metodi statici come `route()`
- [ ] **Namespace Corretto**: Utilizzare `Modules\Employee\Filament\...`
- [ ] **PHPDoc Completo**: Documentare tutti i metodi con tipi corretti

## ERRORE COMUNE: Metodi Astratti Mancanti

### Sintomo
```
FatalError: Class [NomeClasse] contains [N] abstract method(s) and must therefore be declared abstract or implement the remaining methods
```

### Causa
La classe concreta estende una classe astratta XotBase ma non implementa tutti i metodi astratti richiesti.

### Soluzione
1. Identificare la classe base estesa
2. Leggere la classe base per trovare i metodi astratti
3. Implementare TUTTI i metodi astratti nella classe concreta
4. Verificare che la firma del metodo sia identica (staticità, parametri, tipo di ritorno)

### Esempi di Metodi Astratti Comuni
- `XotBaseViewRecord::getInfolistSchema()` - **NON STATICO**
- `XotBaseListRecords::getTableColumns()` - **NON STATICO**
- `XotBaseWidget::getFormSchema()` - **NON STATICO**

## ERRORE COMUNE: Cambio Staticità Metodi

### Sintomo
```
FatalError: Cannot make non static method [Metodo]() static in class [NomeClasse]
```

### Causa
La classe concreta implementa un metodo astratto con staticità diversa da quella definita nella classe base.

### Soluzione
1. Verificare la staticità del metodo nella classe base astratta
2. Implementare il metodo con la STESSA staticità
3. **NON** cambiare mai la staticità dei metodi ereditati

## ERRORE COMUNE: Metodi Statici Mancanti nelle Page Filament

### Sintomo
```
BadMethodCallException: Method [NomeClasse]::route does not exist
```

### Causa
La classe `XotBasePage` non ha il metodo statico `route()` implementato, necessario per le pagine custom.

### Soluzione
1. Verificare che `XotBasePage` abbia il metodo `route()` implementato
2. Se manca, implementarlo nella classe base
3. Utilizzare il metodo per registrare le route delle pagine custom

## ERRORE COMUNE: Metodi Astratti Mancanti nei Widget

### Sintomo
```
FatalError: Class [NomeWidget] contains [N] abstract method(s) and must therefore be declared abstract or implement the remaining methods (Modules\Xot\Filament\Widgets\XotBaseWidget::getFormSchema)
```

### Causa
Il widget estende `XotBaseWidget` ma non implementa il metodo astratto `getFormSchema()`.

### Soluzione
1. Implementare il metodo `getFormSchema()` nel widget
2. Verificare che sia **NON STATICO** (come definito nella classe base)
3. Verificare che sia **PUBLIC** (non protected o private)
4. Restituire un array con la configurazione del form

### Esempio di Implementazione Corretta
```php
/**
 * Get the form schema for the widget.
 * Required by XotBaseWidget abstract method.
 *
 * @return array<int|string, \Filament\Forms\Components\Component>
 */
public function getFormSchema(): array
{
    return [
        // Componenti del form...
    ];
}
```

## ERRORE COMUNE: Visibilità Metodi Astratti Errata

### Sintomo
```
FatalError: Access level to [NomeClasse]::getFormSchema() must be public (as in class Modules\Xot\Filament\Widgets\XotBaseWidget)
```

### Causa
Il metodo astratto è implementato con visibilità `protected` o `private` invece di `public`.

### Soluzione
1. Cambiare la visibilità del metodo da `protected` a `public`
2. Verificare che la signature sia identica alla classe base
3. Aggiornare il PHPDoc con i tipi corretti

### Esempio di Correzione
```php
// ❌ ERRATO
protected function getFormSchema(): array
{
    return [];
}

// ✅ CORRETTO  
public function getFormSchema(): array
{
    return [];
}
```

## Regole Complete di Visibilità per Metodi Astratti

### XotBaseWidget - getFormSchema()
```php
/**
 * Get the form schema for the widget.
 *
 * @return array<int|string, \Filament\Forms\Components\Component>
 */
public function getFormSchema(): array
{
    return [];
}
```

### XotBasePage - getFormSchema()
```php
/**
 * Get the form schema for the page.
 *
 * @return array<int, \Filament\Forms\Components\Component>
 */
public function getFormSchema(): array
{
    return [];
}
```

### XotBaseViewRecord - getInfolistSchema()
```php
/**
 * Get the infolist schema for the view record.
 *
 * @return array<int, \Filament\Infolists\Components\Component>
 */
public function getInfolistSchema(): array
{
    return [];
}
```

### XotBaseListRecords - getTableColumns()
```php
/**
 * Get the table columns for the list records.
 *
 * @return array<string, \Filament\Tables\Columns\Column>
 */
public function getTableColumns(): array
{
    return [];
}
```

### REGOLA CRITICA: Visibilità SEMPRE Public

**TUTTI** i metodi astratti implementati nelle classi concrete che estendono XotBase DEVONO essere `public`, mai `protected` o `private`. Questo è un requisito PHP per l'implementazione di metodi astratti.

## Verifica Post-Implementazione

Dopo aver implementato una classe Filament in Employee Module, verificare SEMPRE:

- [ ] **PHPStan Level 10**: Eseguire analisi statica completa
- [ ] **Metodi Astratti**: Tutti i metodi astratti sono implementati
- [ ] **Staticità**: La staticità dei metodi è corretta
- [ ] **Tipi**: Tutti i tipi di ritorno e parametri sono corretti
- [ ] **Documentazione**: PHPDoc completo per tutti i metodi
- [ ] **Test**: La classe funziona correttamente senza errori

## Riferimenti e Collegamenti

- [Documentazione Root XotBase Extension](../../../docs/xotbase_extension_rules.md)
- [Guida Metodi Astratti Filament](../../../docs/filament_abstract_methods_guide.md)
- [Errori Route Page Filament](../../../docs/filament_page_route_errors.md)
- [Best Practices Modelli](../../../docs/model_inheritance_best_practices.md)
- [Architettura Modelli Employee](model_architecture.md)

---

**RICORDA**: Ogni volta che estendi una classe XotBase in Employee Module, devi implementare TUTTI i suoi metodi astratti con la STESSA firma (staticità, parametri, tipo di ritorno).
>>>>>>> 95b3a4c (.)
