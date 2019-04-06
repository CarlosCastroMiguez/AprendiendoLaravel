<?php

use Illuminate\Http\Request;

//api/proyecto/{id}/niveles

Route::get ('/proyecto/{id}/niveles', 'Admin\LevelController@byProject');
