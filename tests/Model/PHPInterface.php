<?php
declare(strict_types=1);

namespace StubTests\Model;

use PhpParser\Node\Stmt\Interface_;
use ReflectionClass;
use stdClass;

class PHPInterface extends BasePHPClass
{
    public array $parentInterfaces = [];

    /**
     * @param ReflectionClass $reflectionObject
     * @return $this
     */
    public function readObjectFromReflection($reflectionObject): static
    {
        $this->name = $reflectionObject->getName();
        foreach ($reflectionObject->getMethods() as $method) {
            if ($method->getDeclaringClass()->getName() !== $this->name) {
                continue;
            }
            $this->methods[$method->name] = (new PHPMethod())->readObjectFromReflection($method);
        }
        $this->parentInterfaces = $reflectionObject->getInterfaceNames();
        foreach ($reflectionObject->getReflectionConstants() as $constant) {
            if ($constant->getDeclaringClass()->getName() !== $this->name) {
                continue;
            }
            $this->constants[$constant->name] = (new PHPConst())->readObjectFromReflection($constant);
        }
        return $this;
    }

    /**
     * @param Interface_ $node
     * @return $this
     */
    public function readObjectFromStubNode($node): static
    {
        $this->name = $this->getFQN($node);
        $this->collectTags($node);
        if (!empty($node->extends)) {
            $this->parentInterfaces[] = implode('\\', $node->extends[0]->parts);
        }
        return $this;
    }

    public function readMutedProblems(stdClass|array $jsonData): void
    {
        /**@var stdClass $interface */
        foreach ($jsonData as $interface) {
            if ($interface->name === $this->name) {
                if (!empty($interface->problems)) {
                    /**@var stdClass $problem */
                    foreach ($interface->problems as $problem) {
                        switch ($problem) {
                            case 'wrong parent':
                                $this->mutedProblems[] = StubProblemType::WRONG_PARENT;
                                break;
                            case 'missing interface':
                                $this->mutedProblems[] = StubProblemType::STUB_IS_MISSED;
                                break;
                            default:
                                $this->mutedProblems[] = -1;
                                break;
                        }
                    }
                }
                if (!empty($interface->methods)) {
                    foreach ($this->methods as $method) {
                        $method->readMutedProblems($interface->methods);
                    }
                }
                if (!empty($interface->constants)) {
                    foreach ($this->constants as $constant) {
                        $constant->readMutedProblems($interface->constants);
                    }
                }
                return;
            }
        }
    }
}
