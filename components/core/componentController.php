<?php

require_once 'component.php';

class ComponentController {
    protected array $cssDependencies = [];
    protected array $jsDependencies = [];

    public function renderComponent(Component $component): string {
        $this->cssDependencies = [...$this->cssDependencies, ...$component->getCssDependencies()];
        $this->jsDependencies = [...$this->jsDependencies, ...$component->getJsDependencies()];

        return $component->render();
    }

    public function getCssDependencies(): array {
        return $this->cssDependencies;
    }

    public function getJsDependencies(): array {
        return $this->jsDependencies;
    }
}

?>