# aisdk/sakana

<a href="https://github.com/phpaisdk/sakana/actions"><img alt="GitHub Workflow Status" src="https://img.shields.io/github/actions/workflow/status/phpaisdk/sakana/tests.yml?branch=main&label=Tests"></a>
<a href="https://packagist.org/packages/aisdk/sakana"><img alt="Latest Version" src="https://img.shields.io/packagist/v/aisdk/sakana"></a>
<a href="https://packagist.org/packages/aisdk/sakana"><img alt="License" src="https://img.shields.io/packagist/l/aisdk/sakana"></a>

------

Official Sakana AI provider for the PHP AI SDK. Uses Sakana Fugu's OpenAI-compatible API.

## Installation

```bash
composer require aisdk/sakana
```

## Basic Usage

```php
use AiSdk\Generate;
use AiSdk\Sakana;

Sakana::create(['apiKey' => $_ENV['SAKANA_API_KEY']]);

$result = Generate::text('Explain this code briefly.')
    ->model(Sakana::model('fugu'))
    ->run();
```

## Configuration

| Variable | Description | Default |
| --- | --- | --- |
| `SAKANA_API_KEY` | API key for authentication | Required |
| `SAKANA_BASE_URL` | Base URL for API requests | `https://api.sakana.ai/v1` |

## Supported Capabilities

| Capability | Support |
| --- | --- |
| Text generation and streaming | Native OpenAI-compatible chat |
| Tool calling, structured output, reasoning | Passed through for supported Fugu models |
| Image input | Passed through for compatible vision models |

## Provider Options

Use `providerOptions('sakana', ['raw' => [...]])` for documented Sakana fields outside the portable SDK surface. Model IDs are opaque strings and are validated by Sakana AI.

## Documentation

- [Sakana API documentation](https://console.sakana.ai/get-started)
- [PHP AI SDK documentation](https://phpaisdk.com/docs/sakana)
