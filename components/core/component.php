<?php 

abstract class Component {
    protected array $cssDependencies = [];
    protected array $jsDependencies = [];

    public function getCssDependencies(): array {
        return $this->cssDependencies;
    }

    public function getJsDependencies(): array {
        return $this->jsDependencies;
    }

    abstract public function render(): string;
}

?>