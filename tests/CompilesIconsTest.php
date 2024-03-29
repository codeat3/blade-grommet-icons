<?php

declare(strict_types=1);

namespace Tests;

use Codeat3\BladeGrommetIcons\BladeGrommetIconsServiceProvider;
use BladeUI\Icons\BladeIconsServiceProvider;
use Orchestra\Testbench\TestCase;

class CompilesIconsTest extends TestCase
{
    /** @test */
    public function it_compiles_a_single_anonymous_component()
    {
        $result = svg('grommet-ad')->toHtml();

        // Note: the empty class here seems to be a Blade components bug.
        $expected = <<<'SVG'
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10,10 L14,10 L14,14 L10,14 L10,10 Z M14,18 L10,18 C7.790861,18 6,16.209139 6,14 L6,10 C6,7.790861 7.790861,6 10,6 L10,6 L14,6 C16.209139,6 18,7.790861 18,10 L18,14 M14,22 L10,22 C5.581722,22 2,18.418278 2,14 L2,10 C2,5.581722 5.581722,2 10,2 L10,2 L14,2 C18.418278,2 22,5.581722 22,10 L22,14"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_classes_to_icons()
    {
        $result = svg('grommet-ad', 'w-6 h-6 text-gray-500')->toHtml();

        $expected = <<<'SVG'
            <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10,10 L14,10 L14,14 L10,14 L10,10 Z M14,18 L10,18 C7.790861,18 6,16.209139 6,14 L6,10 C6,7.790861 7.790861,6 10,6 L10,6 L14,6 C16.209139,6 18,7.790861 18,10 L18,14 M14,22 L10,22 C5.581722,22 2,18.418278 2,14 L2,10 C2,5.581722 5.581722,2 10,2 L10,2 L14,2 C18.418278,2 22,5.581722 22,10 L22,14"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_styles_to_icons()
    {
        $result = svg('grommet-ad', ['style' => 'color: #555'])->toHtml();

        $expected = <<<'SVG'
            <svg style="color: #555" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10,10 L14,10 L14,14 L10,14 L10,10 Z M14,18 L10,18 C7.790861,18 6,16.209139 6,14 L6,10 C6,7.790861 7.790861,6 10,6 L10,6 L14,6 C16.209139,6 18,7.790861 18,10 L18,14 M14,22 L10,22 C5.581722,22 2,18.418278 2,14 L2,10 C2,5.581722 5.581722,2 10,2 L10,2 L14,2 C18.418278,2 22,5.581722 22,10 L22,14"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    protected function getPackageProviders($app)
    {
        return [
            BladeIconsServiceProvider::class,
            BladeGrommetIconsServiceProvider::class,
        ];
    }
}
