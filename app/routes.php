<?php

Route::get('/', array(
	'as' => 'home',
	'uses' => 'HomeController@home'
));


Route::get('/user/{username}', array(
	'as' => 'profile-user',
	'uses' => 'ProfileController@user'
));

Route::group(array('before' => 'auth'), function()
{
	/* CSRF proteccion group */

	Route::group(array('before' => 'csrf'), function()
	{
		/* Change password (POST) */

		Route::post('/account/change-password', array(
			'as' => 'account-change-password-post',
			'uses' => 'AccountController@postChangePassword'
		));
	});

	/* Change password (GET) */

	Route::get('/account/change-password', array(
		'as' => 'account-change-password',
		'uses' => 'AccountController@getChangePassword'
	));

	/* Sign out (GET) */

	Route::get('/account/sign-out', array(
		'as' => 'account-sign-out',
		'uses' => 'AccountController@getSignOut'
	));

	Route::group(array('before' => 'admon'), function()
	{
		/* Admin Account */
		Route::get('/admin', array(
			'as' => 'admin',
			'uses' => 'AdminController@getIndex'
		));
		
		Route::get('/admin/users', array(
			'as' => 'admin-users',
			'uses' => 'AdminController@getUsers'
		));
	});

	Route::group(array('before' => 'editor'), function()
	{
		Route::get('/editor', array(
			'as' => 'editor',
			'uses' => 'EditorController@getIndex'
		));

		Route::resource('trabajadores', 'TrabajadoresController');

		Route::resource('recibos', 'RecibosController');

		Route::resource('pagos', 'PagosController');

		Route::resource('conceptos', 'ConceptosController');

		Route::get('/reportePdf/{id}', array(
			'as' => 'reportePdf',
			'uses' => 'PdfController@getIndex'
		));

		Route::get('/reportePdfTrab/{id}', array(
			'as' => 'reportePdfTrab',
			'uses' => 'PdfController@getIndexTrab'
		));

		Route::resource('asigdedu', 'AsigDeduccionesController');

		Route::resource('empresas', 'EmpresasController');

		Route::resource('constancias', 'ConstanciasController');

		Route::resource('representantes', 'RepresentantesController');

		Route::get('/constanciaPdf/{id}', array(
			'as' => 'constanciaPdf',
			'uses' => 'PdfController@getIndexCons'
		));

		Route::resource('recibosotros', 'RecibosOtrosController');

		Route::resource('asigdedusotros', 'AsigDedusotrosController');

		Route::resource('pagosotros', 'PagosotrosController');

		Route::get('/reportesotroPdf/{id}', array(
			'as' => 'reportesotroPdf',
			'uses' => 'PdfController@getIndexOtro'
		));

		Route::resource('nominas', 'NominasController');

		Route::resource('detallesnomi', 'DetallesNomiController');
	});

});

/* Autenticacion */
Route::group(array('before' => 'guest'), function()
{
	/* CSRF proteccion */
	Route::group(array('before' => 'csrf'), function()
	{
		/* Crear Cuenta (POST) */

		Route::post('/account/create', array(
			'as' => 'account-create-post',
			'uses' => 'AccountController@postCreate'
		));

		/* Sign in (POST)*/

		Route::post('/account/sign-in', array(
			'as' => 'account-sign-in-post',
			'uses' => 'AccountController@postSignIn'
		));

		/* Forgot password (POST) */

		Route::post('/account/forgot-password', array(
			'as' => 'account-forgot-password-post',
			'uses' => 'AccountController@postForgotPassword'
		));

	});

	/* Forgot password (GET) */

	Route::get('/account/forgot-password', array(
		'as' => 'account-forgot-password',
		'uses' => 'AccountController@getForgotPassword'
	));

	/* Recuperar code (GET) */

	Route::get('/account/recover/{code}', array(
		'as' => 'account-recover',
		'uses' => 'AccountController@getRecover'
	));

	/* Sign in (GET)*/

	Route::get('/account/sign-in', array(
		'as' => 'account-sign-in',
		'uses' => 'AccountController@getSignIn'
	));

	/* Crear cuenta (GET) */

	Route::get('/account/create', array(
		'as' => 'account-create',
		'uses' => 'AccountController@getCreate'
	));

	Route::get('/account/activate/{code}', array(
		'as' => 'account-activate',
		'uses' => 'AccountController@getActivate'
	));


	
});