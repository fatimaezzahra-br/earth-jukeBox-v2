<?php

namespace Tests\Feature;

use Tests\TestCase;

class EarthControllerTest extends TestCase
{
    public function test_dashboard_renders_the_exploration_interface(): void
    {
        $response = $this->get('/');

        $response->assertOk()
            ->assertSee('Écouter la Terre, autrement.')
            ->assertSee('Les phénomènes à l’écoute')
            ->assertSee('Comparer');
    }

    public function test_observations_endpoint_returns_the_demo_series(): void
    {
        $response = $this->getJson('/api/observations');

        $response->assertOk()
            ->assertJsonPath('source', 'Données de démonstration')
            ->assertJsonCount(12, 'observations')
            ->assertJsonPath('observations.0.date', '2025-01');
    }

    public function test_observations_can_be_downloaded_as_csv(): void
    {
        $response = $this->get('/api/observations/export');

        $response->assertOk()
            ->assertHeader('content-type', 'text/csv; charset=UTF-8')
            ->assertHeader('content-disposition', 'attachment; filename=earth-jukebox-observations.csv');
    }
}
