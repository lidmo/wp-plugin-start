<?php

namespace LidmoPrefix\Hooks\Defaults;

use Lidmo\WP\Foundation\Hooks\Hook;

class TheContentFilter extends Hook
{
    protected $name = 'the_content';

    public function handle($content)
    {

        return $content;
    }

    private function before(string $html, string $content): string
    {
        return $html . $content;
    }

    private function middle(string $html, string $content): string
    {
        $paragraphs = explode('</p>', $content);
        $paragraphsCount = count($paragraphs);
        $middleIndex = absint(floor($paragraphsCount / 2));
        $newContent = '';

        for ($i = 0; $i < $paragraphsCount; $i++) {
            if ($i === $middleIndex) {
                $newContent .= $html;
            }
            $newContent .= $paragraphs[$i] . '</p>';
        }

        return $newContent;
    }

    private function after(string $html, string $content): string
    {
        return $content . $html;
    }
}