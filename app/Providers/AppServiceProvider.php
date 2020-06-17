<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // table components
        Blade::component('components.table.table', 'table');
        Blade::component('components.table.header', 'header');
        Blade::component('components.table.body', 'body');
        Blade::component('components.table.footer', 'footer');
        Blade::component('components.table.nodata-row', 'nodatarow');
        
        // generic layout components
        Blade::component('components.layout.container', 'container');
        Blade::component('components.layout.row', 'row');
        Blade::component('components.layout.col', 'col');

        // company components
        Blade::component('components.company.company-row', 'companyrow');
        Blade::component('components.company.company-header', 'companyheader');
        Blade::component('components.company.form', 'companyForm');

        // employee components
        Blade::component('components.employee.employee-row', 'employeerow');
        Blade::component('components.employee.employee-header', 'employeeheader');
        Blade::component('components.employee.form', 'employeeForm');
        
        // form components
        Blade::component('components.form.form', 'form');
        Blade::component('components.form.input', 'input');
        Blade::component('components.form.textarea', 'textarea');
        Blade::component('components.form.readonly', 'readonly');
        Blade::component('components.form.select', 'select');
        Blade::component('components.form.file', 'file');
        Blade::component('components.form.image-file', 'imageFile');
        Blade::component('components.form.button', 'button');
        Blade::component('components.form.action-button', 'actionButton');

        // image
        Blade::component('components.image.thumb', 'thumb');
        Blade::component('components.image.image', 'image');

        // card component
        Blade::component('components.card.card', 'card');
        Blade::component('components.card.header', 'cardHeader');
        Blade::component('components.card.body', 'cardBody');
        Blade::component('components.card.footer', 'cardFooter');

        // link
        Blade::component('components.link', 'link');
        
    }
}
