<?php

it('has no page', function () {
    $response = $this->get('/no');

    $response->assertStatus(200);
});
