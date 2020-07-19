<?php

declare(strict_types=1);

namespace Test\Evaluate;

use PHPUnit\Framework\TestCase;
use Solution\AST\Builder;
use Solution\Evaluate\Context;
use Solution\Evaluate\LinkStorage;
use Solution\Evaluate\NodeExpression;
use Solution\Evaluate\Number;
use Solution\Evaluate\SymbolStorage;
use Solution\Evaluate\ValueInterface;

final class NodeExpressionTest extends TestCase
{

    /**
     * @dataProvider evaluationTestDataProvider
     */
    public function testEvaluation(string $code, $expected)
    {
        $builder = new Builder($code);
        $ast = $builder->build();
        $symbols = new SymbolStorage();
        $links = new LinkStorage();
        $context = new Context($symbols, $links);

        $expression = new NodeExpression($context, $ast);
        $result = $expression->eval();

        $this->assertInstanceOf(ValueInterface::class, $result);
        /** @var ValueInterface $result */
        $this->assertTrue($result->hasValue());
        $this->assertEquals($expected, $result->getValue());
    }

    public function evaluationTestDataProvider()
    {
        return [
            'Number' => ['42', 42],
            'Inc' => ['ap inc 41', 42],
            'Dec' => ['ap dec 43', 42],
            'Add 2' => ['ap ap add 30 12', 42],
            'Add 3' => ['ap ap ap add 15 17 10', 42],
            'Mul' => ['ap ap mul 6 7', 42],
            'Div' => ['ap ap div -170 -4', 42],
            'Eq True' => ['ap ap eq 42 42', true],
            'Eq False' => ['ap ap eq 42 -42', false],
            'Lt True' => ['ap ap lt -42 42', true],
            'Lt False' => ['ap ap lt 42 -42', false],
            'Neg' => ['ap neg -42', 42],
            'Ap' => ['ap ap add ap ap mul -4 -10 2', 42],
            'S' => ['ap ap ap s mul ap add 1 6', 42],
            'C' => ['ap ap ap c add 26 16', 42],
            'B' => ['ap ap ap b inc dec 42', 42],
            'T' => ['ap ap t t ap inc 5', true],
            'F' => ['ap ap f t ap inc 41', 42],
            'Pwr2' => ['ap ap add 10 ap pwr2 5', 42],
            'Complex 1' => ['ap ap mul 2 ap ap ap ap c ap eq 0 1 ap ap add -1 1 ap ap ap b ap mul 2 ap ap b pwr2 ap add -1 ap ap add -1 1', 2],
            'I' => ['ap i ap ap t 42 12', 42],
            'Cons' => ['ap ap ap cons 42 12 t', 42],
            'Car' => ['ap car ap ap cons 42 -42', 42],
            'Cdr' => ['ap cdr ap ap cons 42 -42', -42],
            'Nil' => ['ap nil 42', true],
            'IsNil True' => ['ap isnil nil', true],
            'IsNil False' => ['ap isnil ap ap cons 42 -42', false]
        ];
    }

    public function testRecursiveLinks()
    {
        /**
         * f (x) = x == 0 ? 42 : f(x - 1)
         *
         * f(x) = if0(x)(42)(f(dec(x)))
         * f(x) = if0(x)(42)(B(f)(dec)(x))
         * f(x) = C(if0)(42)(x)(B(f)(dec)(x))
         * f(x) = S(C(if0)(42))(B(f)(dec))(x)
         * f = S(C(if0)(42))(B(f)(dec))
         */
        $ast42 = (new Builder('ap ap s ap ap c if0 42 ap ap b :42 dec'))->build();
        $astMain = (new Builder('ap :42 10000'))->build();
        $symbols = new SymbolStorage();
        $links = new LinkStorage();
        $context = new Context($symbols, $links);

        $links->addLink(42, new NodeExpression($context, $ast42));
        $main = new NodeExpression($context, $astMain);
        $result = $main->eval();

        $this->assertInstanceOf(ValueInterface::class, $result);
        /** @var ValueInterface $result */
        $this->assertTrue($result->hasValue());
        $this->assertEquals(42, $result->getValue());
    }
}
