<?php

namespace Solution\Evaluate;

interface ExpressionInterface {

    public function applyTo(ExpressionInterface $arg): ExpressionInterface;

    public function eval(): ExpressionInterface;

}