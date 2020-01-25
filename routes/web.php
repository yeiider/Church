<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','Auth\LoginController@form')->name('login');
Route::get('/home','Home@index')->name('home');
Route::get('Logaut','Auth\LoginController@logaut')->name('logaut');
Route::post('/Login','Auth\LoginController@valida')->name('valida_login');
Route::get('/dashboard-content', 'react\Dashboar@info')->name('info');
Route::get('/dashboard-chart','react\Dashboar@chartDashboar')->name('chart-dasboard');
Route::get('/Distrito/crear','Distritos@distritoView')->name('add-distrito');
Route::post('/Distrito/crear/set','Distritos@distritoCrear')->name('crear-distrito');
Route::get('/Distritos/info' , 'react\DistritosInfo@info')->name('info_distrito');
Route::get('/Iglesia/crear' , 'Iglesias@createIglesiaView')->name('add-iglesia');
Route::get('/Pastor/get','react\Dashboar@getPastores')->name('get-pastores');
Route::get('/pais_get','react\Dashboar@getPais')->name('pais');
Route::post('/send_iglesia','Iglesias@createIglesia')->name('iglesia-create');
Route::get('/getDistritos','react\DistritosInfo@getDistrito')->name('get-distritos');
Route::get('/Pastor/crear','Pastores@crearPastorView')->name('add-pastor');
Route::post('/Pastor/create','Pastores@crearPastor')->name('c-pastor');
Route::get('/Miembro/crear','Miembros@crearMiembroView')->name('add-miembro');
Route::post('/Miembro/Set','Miembros@crearMiembro')->name('crearMiembro');
Route::get('/Iglesias','Iglesias@index')->name('iglesias');
Route::get('/dashboard-iglesias','react\Dashboar@iglesias')->name('table-iglesia');
Route::get('/Distritos', 'Distritos@index')->name('distritos');
Route::get('/Iglesia/{id}','Iglesias@perfil')->name('perfil_iglesia');
Route::get('/perfil/user','Users@index')->name('perfil-user');
Route::post('/perfil/update/perfil', 'Users@update')->name('update-perfil');
Route::post('/perfil/update/iglesia','Iglesias@updatePerfil')->name('update-iglesia');
Route::get('/Miembros','Miembros@index')->name('miembros');
Route::get('/Diezmo/Add','Diezmos@ingresar')->name('diezmo-add');
Route::post('/Diezmo/diezmante','Diezmos@buscarDiezmante')->name('buscar_diezmante');
Route::post('/Diezmo/registra','Diezmos@registrar')->name('diezmo-registrar');

