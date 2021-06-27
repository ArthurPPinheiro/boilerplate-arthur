alias:
	alias sail='bash vendor/bin/sail'

up:
	sail up

down:
	sail down

shell:
    docker compose exec laravel.app bash
