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
Route::get('/Miembros/info/{id}','Miembros@perfil')->name('perfil-miembro');
Route::post('/Miembros/info/set','Miembros@update')->name('update-miembro');
Route::get('/Miembros/drop/{id}','Miembros@drop')->name('elimina-miembro');
Route::get('/Ofrenda/add/','Ingresos@ofrenda')->name('ofrenda');
Route::post('/Ofrenda/add','Ingresos@setOfrenda')->name('ofrenda-add');
Route::get('/Donaciones/list','Ingresos@donaciones')->name('donaciones');
Route::get('/Donaciones/add',function(){
    if(empty(auth()->user())){
        return view('errors/404');
    }
    return view('iglesia/donaciones_add');
});
Route::post('/Donaciones/set','Ingresos@createDonacion')->name('donacion-create');
Route::post('/Donaciones/Update','Ingresos@updateDonacion')->name('donacion-update');
Route::get('/Ingresos','Ingresos@index')->name('ingresos');
Route::get('/Ingreso/info','react\Dashboar@infoIngresos')->name('info-ingresos');
Route::get('/Ingreso/Chart','react\Dashboar@chartIngresos')->name('chart-ingresos');
Route::get('/Informe/Caja','Cajas@index')->name('caja');
Route::get('/Caja/data-fecha','Cajas@sendMonth')->name('data-caja');
Route::get('/Ingresos/Otros','Ingresos@otrosIngresos')->name('otros-ingresos');
Route::get('Diezmo/drop/{id}','Ingresos@dropDiezmo')->name('drop-diezmo');
Route::get('/Donaciones/estado/{id}','Ingresos@donacionesEstado')->name('donaciones-estado');
Route::get('/Ingreso/tipo','Ingresos@tipoIngreso')->name('tipo_ingreso');
Route::post('/Ingreso/tipo_set','Ingresos@tipoCreate')->name('tipo_set');
Route::post('/Ingreso/create/other','Ingresos@createOtroIngreso')->name('crear-otro-ingreso');
Route::get('/Configuraciones','Configuraciones@index')->name('config');
Route::post('/Cuenta/Crear','Cuentas@create')->name('crear-cuenta');
Route::get('/Cuentas/drop/{id}','Cuentas@drop')->name('drop-cuentas');

Route::get('/Ingresos/Statec/{id}','Ingresos@cambiarEstado')->name('change-statec');
Route::get('/Egresos','Egresos@index')->name('egresos');

Route::get('/Egreso/Agregar','Egresos@egresosAddView')->name('egreso-add');
Route::post('/Egreso/create','Egresos@createEgreso')->name('crear-egreso');
Route::get('/Empleados','Empleados@index')->name('empleados');
Route::get('/Empleado/crear','Empleados@createView')->name('empleado-add');
Route::post('/Empleados/set','Empleados@createSet')->name('create-empleado');
Route::get('/Nominas','Nominas@index')->name('nominas');
Route::get('/Nominas/Generar/{id}','Nominas@generarNomina')->name('generar-nomina');
Route::get('Actividad/view/{id}','Actividades@viewActivityPdf')->name('activity');

Route::get('/Nominas/view/{id}','Nominas@nomiaViewPdf')->name('nominaView');
Route::get('/Actividades/me','Actividades@managerActivity')->name('mis-actividades');
Route::get('Actividades/Drop/{id}','Actividades@drop')->name('activida-drop');
Route::post('Activity/set/Update','Actividades@updateActivity')->name('update-activity');
Route::get('Empleado/{id}','Empleados@empleadoView')->name('empleado-view');

Route::get('/Inventario','Inventarios@index')->name('inventario');
Route::post('/Inventario/add','Inventarios@create')->name('inventario-crear');

// actividades //

Route::get('/Actividades','Actividades@index')->name('actividades');
Route::post('/Actividades/set','Actividades@create')->name('crear-actividad');

