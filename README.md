# WP Plugin Start
WP plugin start based on laravel features  

## Instalation
```shell
composer create-project lidmo/wp-plugin-start plugin-name
```

## Hooks
To understand how the plugin is structured, I suggest you check the default hooks in the src/Hooks directory 
and the registration of these hooks in the src/Hooks/Kernel.php class  

Hooks extend the \Lidmo\WP\Foundation\Hooks\Hook class, where name, type, arguments and priority are handled. The hook 
suffix determines its type automatically, while the namespace determines its name.  

### Create hook
  
To add an action to wp_enqueue_scripts we can create an EnqueueScriptsAction class in the src/Hooks/Wp directory  
```php
namespace PluginName\Hooks\Wp;

use Lidmo\WP\Foundation\Hooks\Hook;

class EnqueueScriptsAction extends Hook
{

    public function handle()
    {
        // your code here
    }
}
```
To add a filter to wp_insert_post_data, we can create an InsertPostDataFilter class in the src/Hooks/Wp directory  
```php
namespace PluginName\Hooks\Wp;

use Lidmo\WP\Foundation\Hooks\Hook;

class InsertPostDataFilter extends Hook
{
    public function handle($attributes)
    {
        // your code here
    }
}
```
### Register hook
```php
namespace PluginName\Hooks;

use Lidmo\WP\Foundation\Hooks\Kernel as HooksKernel;

class Kernel extends HooksKernel
{
    protected $hooks = [
        // Actions
        \PluginName\Hooks\Wp\EnqueueScriptsAction::class,

        // Filters
        \PluginName\Hooks\Wp\InsertPostDataFilter::class,
    ];
}
```
### Set hook properties
```php
protected $name = 'hook_name'; // set hook name
protected $type = 'filter'; // set hook filter
protected $priority = 100; // set hook priority
protected $acceptedArgs = 1; // set hook args
```