<?php

interface MyIterator {
    public function hasNext();
    public function next();
}

interface Container {
    public function getIterator(): MyIterator;
}


/**
 * 迭代器
 */
class NameIterator implements MyIterator {
    private $names;
    private $index = 0;

    public function __construct(array $s)
    {   $this->names = $s;
        
    }

    public function hasNext()
    {
        return $this->index < count($this->names);
    }

    public function next()
    {
        if ($this->hasNext()) {
            return $this->names[$this->index++];
        }else {
            return null;
        }
    }
}

/**
 * Container
 */
class NameRepository implements Container {
    public $names = ["Robert", "John", "Julie", "Lora"];

    public function getIterator(): MyIterator {
        return new NameIterator($this->names);
    }
}

$repository = new NameRepository();

for($iter = $repository->getIterator(); $iter->hasNext();) {
    $name = $iter->next();
    echo $name . PHP_EOL;
}
