<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewTenantComponentTest extends TestCase
{
    public function tenant_page_contains_tenant_livewire_component()
    {
        $this->get('/unit/{uuid}/tenant/{random_str}/create')
            ->assertSeeLivewire('tenant-component');
    }
}
