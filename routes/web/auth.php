<?php
/**
 * Created by PhpStorm.
 * User: Saurav KC
 * Date: 2/23/2018
 * Time: 11:03 PM
 */

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('register/success', 'Auth\RegisterController@success')->name('register.success');
$this->get('register/{role}', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register/{role}', 'Auth\RegisterController@registerNew');


// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
$this->post('password/reset', 'Auth\ForgotPasswordController@reset')->name('password.reset');
$this->post('password/reseted','Auth\ResetPasswordController@resetPassword')->name('password.reseted');


$this->get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
$this->get('auth/callback/{provider}', 'Auth\AuthController@handleProviderCallback');
$this->post('student-signup','Auth\AuthController@studentSignupStore')->name('students-signup.store');