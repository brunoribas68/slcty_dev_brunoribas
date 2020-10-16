<?php

Route::get('/', "FormularioController@index")->name("formulario");
Route::get('formulario', "FormularioController@index")->name("formulario");
Route::post('cadastro', "FormularioController@cadastro")->name("cadastro");
