.PHONY: library
library:
	go build -buildmode=c-shared -o prime.so prime.go

.PHONY: gofromc
gofromc:
	gcc -Wall -o prime prime.c ./prime.so && ./prime

.PHONY: gofromphp
gofromphp: library
	php prime.php
