<?php

Route::get('/', "FormularioController@index")->name("formulario");
Route::get('formulario', "FormularioController@index")->name("formulario");
Route::post('cadastro', "FormularioController@cadastro")->name("cadastro");
Route::get("/listagemCadastros", "CadastrosController@listagem")->name("listagemCadastros");
Route::get("/deletarCadastro/{idUsuario}", "CadastrosController@deletarCadastro")->name("deletarCadastro");
Route::get("/formularioEditarCadastro/{idUsuario}", "CadastrosController@formularioEditarCadastro")->name("formularioEditarCadastro");
Route::post("/editarCadastro", "CadastrosController@editarCadastro")->name("editarCadastro");
Route::get("/deletarFormacao/{idFormacao}", "CadastrosController@deletarFormacao")->name("deletarFormacao");
Route::get("/deletarExperiencia/{idExperiencia}", "CadastrosController@deletarExperiencia")->name("deletarExperiencia");
