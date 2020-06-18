<?php

function isPrime(int $n) : bool {
	if ($n <= 3) {
		return $n > 1;
	} else if ($n%2 == 0 || $n%3 == 0) {
		return false;
	}

	for ($i = 5; $i*$i <= $n; $i += 6) {
		if ($n%$i == 0 || $n%($i+2) == 0) {
			return false;
		}
	}

	return true;
}

function getMaxPrime(int $n) : int {
    $maxPrime = 2;
	for ($i = 0; $i < $n; $i++) {
		if (isPrime($i) && $i > $maxPrime) {
			$maxPrime = $i;
		}
	}

	return $maxPrime;
}

// php
$start = microtime(true);

$maxPrime = getMaxPrime(10000000);

$elapsed = microtime(true) - $start;
echo 'PHP code elapsed: ' . $elapsed . PHP_EOL;
echo 'Result: ' . $maxPrime . PHP_EOL;

// go
$ffi = FFI::cdef("int getMaxPrime(int n);", "prime.so");
$start = microtime(true);

$maxPrime = $ffi->getMaxPrime(10000000);

$elapsed = microtime(true) - $start;
echo 'Go code elapsed: ' . $elapsed . PHP_EOL;
echo 'Result: ' . $maxPrime . PHP_EOL;
