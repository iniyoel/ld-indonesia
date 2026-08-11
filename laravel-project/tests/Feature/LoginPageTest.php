<?php

namespace Tests\Feature;

use Tests\TestCase;

class LoginPageTest extends TestCase
{
    public function test_login_page_includes_csrf_token_for_password_reset_requests(): void
    {
        $response = $this->get('/masuk');

        $response->assertOk();
        $response->assertSee('name="csrf-token"', false);
    }
}
