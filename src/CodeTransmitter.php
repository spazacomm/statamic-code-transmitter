<?php

namespace SpazaComm\CodeTransmitter;

use Statamic\Fields\Fieldtype;
use Statamic\Facades\Antlers;

class CodeTransmitter extends Fieldtype
{
    protected static $title = 'Code Transmitter';

    protected $icon = 'code';

    protected $categories = ['text'];

    /**
     * The blank/default value.
     *
     * @return null
     */
    public function defaultValue()
    {
        return null;
    }

    /**
     * Pre-process the data before it gets sent to the publish page.
     *
     * @param  mixed  $data
     * @return array|mixed
     */
    public function preProcess($data)
    {
        return $data;
    }

    /**
     * Process the data before it gets saved.
     *
     * @param  mixed  $data
     * @return array|mixed
     */
    public function process($data)
    {
        return $data ?? $this->config('code');
    }

    protected function configFieldItems(): array
    {
        return [
            'code' => [
                'display' => __('Code'),
                'type' => 'code',
                'mode' => 'htmlmixed',
                'default' => '<!-- Paste your code here -->',
            ],
            'theme' => [
                'display' => __('Display'),
                'instructions' => __('statamic::fieldtypes.code.config.theme'),
                'type' => 'select',
                'default' => 'material',
                'options' => [
                    'material' => __('Dark'),
                    'light' => __('Light'),
                ],
                'width' => 50,
            ],
            'mode' => [
                'display' => __('Mode'),
                'instructions' => __('statamic::fieldtypes.code.config.mode'),
                'type' => 'select',
                'default' => 'htmlmixed',
                'options' => [
                    'css' => 'CSS',
                    'htmlmixed' => 'HTML',
                    'javascript' => 'JavaScript',
                ],
                'width' => 50,
            ],
            'indent_type' => [
                'display' => __('Indent Type'),
                'instructions' => __('statamic::fieldtypes.code.config.indent_type'),
                'type' => 'select',
                'default' => 'tabs',
                'options' => [
                    'tabs' => __('Tabs'),
                    'spaces' => __('Spaces'),
                ],
                'width' => 50,
            ],
            'indent_size' => [
                'display' => __('Indent Size'),
                'instructions' => __('statamic::fieldtypes.code.config.indent_size'),
                'type' => 'integer',
                'default' => 4,
                'width' => 50,
            ],
            'key_map' => [
                'display' => __('Key Mappings'),
                'instructions' => __('statamic::fieldtypes.code.config.key_map'),
                'type' => 'select',
                'default' => 'default',
                'options' => [
                    'default' => 'Default',
                    'sublime' => 'Sublime',
                    'vim' => 'Vim',
                ],
                'width' => 50,
            ],
            'line_numbers' => [
                'display' => __('Show Line Numbers'),
                'type' => 'toggle',
                'default' => true,
                'width' => 50,
            ],
            'line_wrapping' => [
                'display' => __('Enable Line Wrapping'),
                'type' => 'toggle',
                'default' => true,
                'width' => 50,
            ],
        ];
    }

    public function augment($value)
    {
        // Parse the value with the Antlers parser
        $parsedValue = Antlers::parse($value);

        // Replace PHP tags to avoid conflicts
        return str_replace('<?php', '&lt;?php', $parsedValue);
    }
}
