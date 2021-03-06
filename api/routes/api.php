<?php

Route::post("cadastrar", "CadastroController@cadastrar")->name("cadastrar");
Route::get("getCadastros", "CadastroController@getCadastros")->name("getCadastros");
Route::post("getCadastroById", "CadastroController@getCadastroById")->name("getCadastroById");
Route::post("deletarCadastroById", "CadastroController@deletarCadastroById")->name("deletarCadastroById");
Route::post("editarCadastroById", "CadastroController@editarCadastroById")->name("editarCadastroById");
Route::post("editarFormacaoById","FormacaoController@editarFormacaoById")->name("editarFormacaoById");
Route::get("deletarFormacaoById/{idFormacao}","FormacaoController@deletarFormacaoById")->name("deletarFormacaoById");
Route::post("editarExperienciaById","ExperienciaController@editarExperienciaById")->name("editarExperienciaById");
Route::get("deletarExperienciaById/{idFormacao}","ExperienciaController@deletarExperienciaById")->name("deletarExperienciaById");
