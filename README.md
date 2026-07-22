# Sakana provider for PHP AI SDK

```bash
composer require aisdk/sakana
```

```php
use AiSdk\Generate;
use AiSdk\Sakana;

Sakana::create(['apiKey' => $_ENV['SAKANA_API_KEY']]);

$result = Generate::text('Explain this code briefly.')
    ->model(Sakana::model('fugu'))
    ->run();
```

This package uses SAKANA Fugu's official OpenAI-compatible API at `https://api.sakana.ai/v1`. It supports text and streaming generation; tool calling, structured output, reasoning, and image input are passed through for Fugu models that expose those capabilities. See [SAKANA API documentation](https://console.sakana.ai/get-started) and [PHP AI SDK documentation](https://phpaisdk.com/docs/sakana).
