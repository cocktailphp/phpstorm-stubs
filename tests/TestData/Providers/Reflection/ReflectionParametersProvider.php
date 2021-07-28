<?php
declare(strict_types=1);

namespace StubTests\TestData\Providers\Reflection;

use Generator;
use StubTests\Model\PHPParameter;
use StubTests\Model\StubProblemType;
use StubTests\TestData\Providers\EntitiesFilter;
use StubTests\TestData\Providers\ReflectionStubsSingleton;

class ReflectionParametersProvider
{
    public static function functionParametersProvider(): ?Generator
    {
        foreach (EntitiesFilter::getFilteredFunctions() as $function) {
            if (!empty(getenv('PECL')) && !empty(ReflectionStubsSingleton::getReflectionStubsNoPecl()->getFunction($function->name))) {
                continue;
            }
            $PHPParameters = EntitiesFilter::getFilteredParameters(
                $function,
                null
            );
            foreach ($PHPParameters as $parameter) {
                yield "$function->name($parameter->name)" => [$function, $parameter];
            }
        }
    }

    public static function functionParametersWithTypeProvider(): ?Generator
    {
        foreach (EntitiesFilter::getFilteredFunctions() as $function) {
            if (!empty(getenv('PECL')) && !empty(ReflectionStubsSingleton::getReflectionStubsNoPecl()->getFunction($function->name))) {
                continue;
            }
            foreach (EntitiesFilter::getFilteredParameters(
                $function,
                null,
                StubProblemType::PARAMETER_TYPE_MISMATCH
            ) as $parameter) {
                yield "$function->name($parameter->name)" => [$function, $parameter];
            }
        }
    }

    public static function functionOptionalParametersProvider(): ?Generator
    {
        foreach (EntitiesFilter::getFilteredFunctions() as $function) {
            if (!empty(getenv('PECL')) && !empty(ReflectionStubsSingleton::getReflectionStubsNoPecl()->getFunction($function->name))) {
                continue;
            }
            foreach (EntitiesFilter::getFilteredParameters(
                $function,
                fn (PHPParameter $parameter) => !$parameter->isOptional,
                StubProblemType::PARAMETER_TYPE_MISMATCH,
                StubProblemType::WRONG_OPTIONALLITY
            ) as $parameter) {
                yield "$function->name($parameter->name)" => [$function, $parameter];
            }
        }
    }

    public static function functionOptionalParametersWithDefaultValueProvider(): ?Generator
    {
        foreach (EntitiesFilter::getFilteredFunctions() as $function) {
            if (!empty(getenv('PECL')) && !empty(ReflectionStubsSingleton::getReflectionStubsNoPecl()->getFunction($function->name))) {
                continue;
            }
            foreach (EntitiesFilter::getFilteredParameters(
                $function,
                fn (PHPParameter $parameter) => !$parameter->isOptional || empty($parameter->defaultValue),
                StubProblemType::WRONG_PARAMETER_DEFAULT_VALUE
            ) as $parameter) {
                yield "$function->name($parameter->name)" => [$function, $parameter];
            }
        }
    }

    public static function methodParametersProvider(): ?Generator
    {
        $classesAndInterfaces = ReflectionStubsSingleton::getReflectionStubs()->getClasses() +
            ReflectionStubsSingleton::getReflectionStubs()->getInterfaces();
        foreach (EntitiesFilter::getFiltered($classesAndInterfaces) as $class) {
            if (!empty(getenv('PECL')) &&
                (!empty(ReflectionStubsSingleton::getReflectionStubsNoPecl()->getClass($class->name)) ||
                    !empty(ReflectionStubsSingleton::getReflectionStubsNoPecl()->getInterface($class->name)))) {
                continue;
            }
            //exclude classes from PHPReflectionParser
            if (strncmp($class->name, 'PHP', 3) !== 0) {
                foreach (EntitiesFilter::getFilteredFunctions($class) as $method) {
                    foreach (EntitiesFilter::getFilteredParameters($method, null) as $parameter) {
                        yield "$class->name::$method->name($parameter->name)" => [$class, $method, $parameter];
                    }
                }
            }
        }
    }

    public static function methodOptionalParametersProvider(): ?Generator
    {
        $classesAndInterfaces = ReflectionStubsSingleton::getReflectionStubs()->getClasses() +
            ReflectionStubsSingleton::getReflectionStubs()->getInterfaces();
        foreach (EntitiesFilter::getFiltered($classesAndInterfaces) as $class) {
            if (!empty(getenv('PECL')) &&
                (!empty(ReflectionStubsSingleton::getReflectionStubsNoPecl()->getClass($class->name)) ||
                    !empty(ReflectionStubsSingleton::getReflectionStubsNoPecl()->getInterface($class->name)))) {
                continue;
            }
            //exclude classes from PHPReflectionParser
            if (strncmp($class->name, 'PHP', 3) !== 0) {
                foreach (EntitiesFilter::getFilteredFunctions($class) as $method) {
                    foreach (EntitiesFilter::getFilteredParameters(
                        $method,
                        fn (PHPParameter $parameter) => !$parameter->isOptional,
                        StubProblemType::WRONG_OPTIONALLITY
                    ) as $parameter) {
                        yield "$class->name::$method->name($parameter->name)" => [$class, $method, $parameter];
                    }
                }
            }
        }
    }

    public static function methodOptionalParametersWithDefaultValueProvider(): ?Generator
    {
        $classesAndInterfaces = ReflectionStubsSingleton::getReflectionStubs()->getClasses() +
            ReflectionStubsSingleton::getReflectionStubs()->getInterfaces();
        foreach (EntitiesFilter::getFiltered($classesAndInterfaces) as $class) {
            if (!empty(getenv('PECL')) && (!empty(ReflectionStubsSingleton::getReflectionStubsNoPecl()->getClass($class->name))) ||
                !empty(ReflectionStubsSingleton::getReflectionStubsNoPecl()->getInterface($class->name))) {
                continue;
            }
            //exclude classes from PHPReflectionParser
            if (strncmp($class->name, 'PHP', 3) !== 0) {
                foreach (EntitiesFilter::getFilteredFunctions($class) as $method) {
                    foreach (EntitiesFilter::getFilteredParameters(
                        $method,
                        fn (PHPParameter $parameter) => !$parameter->isOptional || empty($parameter->defaultValue),
                        StubProblemType::WRONG_PARAMETER_DEFAULT_VALUE
                    ) as $parameter) {
                        yield "$class->name::$method->name($parameter->name)" => [$class, $method, $parameter];
                    }
                }
            }
        }
    }
}
