# comandos del proyecto

## crear proyecto
composer create-project laravel/laravel sistema_facturas 8.*

## Funciones del proyecto
composer require laravel/ui
php artisan ui bootstrap --auth
npm install
npm run dev

## generador de crud 
composer require ibex/crud-generator --dev
php artisan vendor:publish --tag=crud

## crear migrcion el la bd  
php artisan make:migration factura (se crea sin s pero a la tabla si se la agregamos)

## crear tabla en la bd (con seed en caso de tener)
php artisan migrate:fresh --seed

## crear crud 
php artisan make:crud facturas  (se crea en base a la tabla con s)

# Para hacer link simbolico de la carpeta storage/public  y acceder desde su URL
php artisan storage:linka

# Para llenar tablas en  producción OJO SOBREESCRIBE TODO
migrate:fresh --seed --force