<?php 

abstract class Component {
    protected array $dependencies = [];

    public function getDependencies(): array {
        return $this->dependencies;
    }

    abstract public function render(): string;
}

?>