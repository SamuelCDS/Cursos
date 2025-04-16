<?php

use Laravel\Dusk\Browser;

it('has n page', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/n')
            ->assertSee('n');
    });
});
