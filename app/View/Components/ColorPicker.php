<?php
namespace App\View\Components;

use Illuminate\View\Component;

class ColorPicker extends Component
{
    public string $colorLabel;
    public string $colorId;
    public string $textLabel;
    public string $textId;
    public string $textName;
    public string $defaultValue;

    public function __construct(
        string $colorLabel = 'Pick a color',
        string $colorId = 'colorPicker',
        string $textLabel = 'Color value',
        string $textId = 'colorText',
        string $textName = 'color',
        string $defaultValue = '#000000'
    ) {
        $this->colorLabel = $colorLabel;
        $this->colorId = $colorId;
        $this->textLabel = $textLabel;
        $this->textId = $textId;
        $this->textName = $textName;
        $this->defaultValue = $defaultValue;
    }

    public function render()
    {
        return view('components.color-picker');
    }
}
