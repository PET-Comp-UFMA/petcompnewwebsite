<?php

require_once 'component.php';

class ComponentController {
    protected array $dependencies = [];

    public function renderComponent(Component $component): string {
        $this->dependencies = [...$this->dependencies, ...$component->getDependencies()];

        return $component->render();
    }

    public function getDependencies(): array {
        return $this->dependencies;
    }
}

?>