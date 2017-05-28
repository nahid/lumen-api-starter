<?php

return [

    /*
     | Quick fix to bind the translator interface with the app's translator's
     | translator instance which is used in the prettus/laravel-validation
     | package.
     */

    Illuminate\Contracts\Translation\Translator::class => app('translator'),

    /*
     |--------------------------------------------------------------------------
     | Repository Contracts
     |--------------------------------------------------------------------------
     |
     | Here we will bind the interface contracts with the repository eloquent
     | classes.
     */
];
