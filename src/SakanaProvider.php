<?php

declare(strict_types=1);

namespace AiSdk\Sakana;

use AiSdk\Contracts\BaseProvider;
use AiSdk\Contracts\TextModelInterface;
use AiSdk\Contracts\TextProviderInterface;
use AiSdk\Sakana\Models\SakanaTextModel;

final class SakanaProvider extends BaseProvider implements TextProviderInterface
{
    public function __construct(public readonly SakanaOptions $options) {}
    public function name(): string
    {
        return SakanaOptions::PROVIDER_NAME;
    }
    protected function textModel(string $modelId): TextModelInterface
    {
        return new SakanaTextModel($modelId, $this->options);
    }
}
