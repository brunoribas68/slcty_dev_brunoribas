<?php

Route::post("cadastrar", "CadastroController@cadastrar")->name("cadastrar");
Route::get("getCadastros", "CadastroController@getCadastros")->name("getCadastros");
Route::get("getCadastroById", "CadastroController@getCadastroById")->name("getCadastroById");
Route::post("deletarCadastroById", "CadastroController@deletarCadastroById")->name("deletarCadastroById");
Route::post("editarCadastroById", "CadastroController@editarCadastroById")->name("editarCadastroById");
Route::post("editarFormacaoById","CadastroController@editarFormacaoById")->name("editarFormacaoById");
Route::post("editarExperienciaById","CadastroController@editarExperienciaById")->name("editarExperienciaById");
