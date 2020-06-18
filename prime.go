package main

import "C"

func isPrime(n int) bool {
	if n <= 3 {
		return n > 1
	} else if n%2 == 0 || n%3 == 0 {
		return false
	}

	for i := 5; i*i <= n; i += 6 {
		if n%i == 0 || n%(i+2) == 0 {
			return false
		}
	}

	return true
}

//export getMaxPrime
func getMaxPrime(n int) int {
	maxPrime := 2
	for i := 0; i < n; i++ {
		if isPrime(i) && i > maxPrime {
			maxPrime = i
		}
	}

	return maxPrime
}

func main() {}
