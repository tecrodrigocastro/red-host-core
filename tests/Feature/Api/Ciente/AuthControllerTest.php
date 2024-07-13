<?php

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Pest\Laravel\{actingAs, post};

use function Pest\Laravel\post;

uses(RefreshDatabase::class);

it('registers a new client', function () {
    $response = post('/api/register', [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => 'password',
    ]);

    $response->assertStatus(201)
             ->assertJsonStructure(['token']);

    $this->assertDatabaseHas('clients', [
        'email' => 'john@example.com',
    ]);
});

it('fails to register a client with existing email', function () {
    Client::factory()->create(['email' => 'john@example.com']);

    $response = post('/api/register', [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => 'password',
    ]);

    $response->assertStatus(400);
});

it('logs in an existing client', function () {
    $client = Client::factory()->create([
        'email' => 'john@example.com',
        'password' => Hash::make('password'),
    ]);

    $response = post('/api/login', [
        'email' => 'john@example.com',
        'password' => 'password',
    ]);

    $response->assertStatus(200)
             ->assertJsonStructure(['token']);
});

it('fails to log in with incorrect credentials', function () {
    $client = Client::factory()->create([
        'email' => 'john@example.com',
        'password' => Hash::make('password'),
    ]);

    $response = post('/api/login', [
        'email' => 'john@example.com',
        'password' => 'wrongpassword',
    ]);

    $response->assertStatus(401)
             ->assertJson(['error' => 'Unauthorized']);
});
