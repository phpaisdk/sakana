<?php

declare(strict_types=1);

namespace AiSdk\Sakana\Models;

use AiSdk\Capability;
use AiSdk\Contracts\BaseModel;
use AiSdk\Contracts\TextModelInterface;
use AiSdk\OpenAICompatible\ChatRequestBuilder;
use AiSdk\OpenAICompatible\ChatResponseParser;
use AiSdk\OpenAICompatible\ChatStreamParser;
use AiSdk\Requests\TextModelRequest;
use AiSdk\Responses\TextModelResponse;
use AiSdk\Sakana\SakanaOptions;
use AiSdk\Utils\Support\Url;
use Generator;

final class SakanaTextModel extends BaseModel implements TextModelInterface
{
    private const array CAPABILITIES = [Capability::TextGeneration, Capability::Streaming, Capability::ToolCalling, Capability::StructuredOutput, Capability::Reasoning, Capability::TextInput, Capability::ImageInput];
    public function __construct(private readonly string $modelId, private readonly SakanaOptions $options) {}
    public function provider(): string
    {
        return SakanaOptions::PROVIDER_NAME;
    }
    public function modelId(): string
    {
        return $this->modelId;
    }
    public function generate(TextModelRequest $request): TextModelResponse
    {
        $this->ensureTextRequestSupported($request, self::CAPABILITIES);

        return ChatResponseParser::parse($this->runner($this->options->sdk)->postJson(Url::joinPath($this->options->baseUrl, '/chat/completions'), ChatRequestBuilder::build($this->modelId, $this->provider(), $request, false), $this->options->authHeaders(), $this->provider()), $this->provider());
    }
    public function stream(TextModelRequest $request): Generator
    {
        $this->ensureTextRequestSupported($request, self::CAPABILITIES, streaming: true);
        yield from ChatStreamParser::parse($this->runner($this->options->sdk)->postStream(Url::joinPath($this->options->baseUrl, '/chat/completions'), ChatRequestBuilder::build($this->modelId, $this->provider(), $request, true), $this->options->authHeaders(), $this->provider()), $this->provider());
    }
}
