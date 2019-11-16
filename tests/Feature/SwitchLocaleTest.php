<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SwitchLocaleTest extends TestCase
{
    use RefreshDatabase;

    public function testSwitchLocaleToFr()
    {
        $this->assertEquals(app()->getLocale(), 'en');

        $this->get(route('home'))
            ->assertOk()
            ->assertSee(trans('layout.previous_bulletins', [], 'en'));

        $this->get(route('setLocale', 'fr'));

        $this->get(route('home'))
            ->assertOk()
            ->assertSee(trans('layout.previous_bulletins', [], 'fr'));
    }
}
