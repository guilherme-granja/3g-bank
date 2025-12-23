<?php

test('check nif screen can be rendered', function () {
    $response = $this->get(route('auth.check-nif'));

    $response->assertStatus(200);
});
