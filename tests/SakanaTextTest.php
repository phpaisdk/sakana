<?php

declare(strict_types=1);
use AiSdk\Generate;
use AiSdk\Sakana;
use AiSdk\Sakana\Tests\Fakes\FakeHttpClient;
use AiSdk\Support\Sdk;
use Nyholm\Psr7\Factory\Psr17Factory;

afterEach(function (): void {
    Generate::reset();
    Sakana::reset();
});
it('uses Sakana general OpenAI-compatible chat completions', function (): void {
    $client = new FakeHttpClient(200, json_encode(['id' => 'sakana-chat', 'model' => 'fugu', 'choices' => [['message' => ['content' => 'Hello from Sakana Fugu'], 'finish_reason' => 'stop']], 'usage' => ['prompt_tokens' => 3, 'completion_tokens' => 4]]));
    $factory = new Psr17Factory();
    Generate::configure(new Sdk($client, $factory, $factory));
    Sakana::create(['apiKey' => 'sakana-test']);
    $result = Generate::text('Hi')->model(Sakana::model('fugu'))->run();
    expect($result->text)->toBe('Hello from Sakana Fugu')->and((string) $client->lastRequest?->getUri())->toBe('https://api.sakana.ai/v1/chat/completions')->and($client->lastRequest?->getHeaderLine('Authorization'))->toBe('Bearer sakana-test')->and($client->sentBody()['model'])->toBe('fugu');
});
it('accepts opaque Sakana model identifiers', function (): void {
    Sakana::create(['apiKey' => 'sakana-test']);
    expect(Sakana::model('private-fugu-model')->modelId())->toBe('private-fugu-model');
});
