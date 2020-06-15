install:
	composer install
lint:
	composer run-script phpcs -- --standard=PSR12 src bin Games Engine
.PHONY: test log