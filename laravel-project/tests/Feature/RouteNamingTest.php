<?php

namespace Tests\Feature;

use Tests\TestCase;

class RouteNamingTest extends TestCase
{
    public function test_index_route_without_html_is_available(): void
    {
        $response = $this->get('/index');

        $response->assertStatus(200);
    }

    public function test_login_route_without_html_is_available(): void
    {
        $response = $this->get('/masuk');

        $response->assertStatus(200);
    }

    public function test_legacy_html_route_redirects_to_extensionless_route(): void
    {
        $response = $this->get('/masuk.html');

        $response->assertRedirect('/masuk');
    }
}
