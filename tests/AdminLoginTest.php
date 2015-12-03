<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminLoginTest extends TestCase {

   use DatabaseMigrations, DatabaseTransactions;

   /**
    * Test redirect neu khong co quyen truy cap hoac chua dang nhap
    * @return void
    */
   public function testRedirectToLoginPageIfNotAuthen()
   {
      $this->visit('/admin/dashboard')
         ->seePageIs('/admin/login');
   }

   /**
    * Test login
    * @return void
    */
   public function testLogin()
   {
      $this->visit('/admin/login')
         ->see('Administrator')
         ->type('admin@nguyenhats.com', 'email')
         ->type('admin1234', 'password')
         ->press('Log in')
         ->assertRedirectedTo('/admin/dashboard');
   }
}
