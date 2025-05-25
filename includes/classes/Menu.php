<?php
declare(strict_types=1);

namespace SathyaSaiSchool;

class Menu {
    private array $items = [];

    public function addItem(string $url, string $title, string $icon = 'fa-chevron-right'): self
    {
        $this->items[] = [
            'url' => $url,
            'title' => $title,
            'icon' => $icon
        ];
        return $this;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function render(): string
    {
        $html = '<ul class="list-unstyled">';
        foreach ($this->items as $item) {
            $html .= sprintf(
                '<li class="mb-2">
                    <i class="fa-solid %s me-2 text-primary"></i>
                    <a href="%s">%s</a>
                </li>',
                htmlspecialchars($item['icon']),
                htmlspecialchars(url_path($item['url'])),
                htmlspecialchars($item['title'])
            );
        }
        $html .= '</ul>';
        return $html;
    }
} 