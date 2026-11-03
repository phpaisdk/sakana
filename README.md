# PHP AI SDK — Sakana AI

Text generation, streaming, and tool calling through Sakana AI. Part of the framework-agnostic [PHP AI SDK](https://phpaisdk.com).

## Installation

```bash
composer require aisdk/sakana
```

Set `SAKANA_API_KEY` in your environment.

## Usage

```php
use AiSdk\Generate;
use AiSdk\Sakana;

$result = Generate::text('Explain closures in PHP in one sentence.')
    ->model(Sakana::model('fugu-max'))
    ->run();

echo $result->text;
```

## Documentation

[Read the documentation](https://phpaisdk.com/docs/0.x/providers/sakana) for configuration, supported features, and more examples.

[Contributing](https://github.com/phpaisdk/.github/blob/main/CONTRIBUTING.md) · [Support](https://github.com/phpaisdk/.github/blob/main/SUPPORT.md)

## License

The MIT License (MIT). See [LICENSE](LICENSE) for details.
