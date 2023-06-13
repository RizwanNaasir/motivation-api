<?php

if (!function_exists('when')) {
    function when(bool $has, \Closure $call,): void
    {
        $has ?: $call();
    }
}
