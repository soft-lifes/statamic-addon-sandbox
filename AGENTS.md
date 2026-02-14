# AGENTS.md - Statamic Addon Sandbox

This is a Statamic addon development environment using Laravel Sail (Docker).

## Structure

```
.
├── addons/{addon-name}/   ← Addon code (git submodule) - EDIT HERE
├── config/                ← Statamic/Laravel config
├── content/               ← Statamic content (collections, entries)
├── resources/             ← Views, assets
├── vendor/                ← Dependencies (don't edit)
└── compose.yaml           ← Docker Compose config
```

## Running Commands

**Always use Sail** — host PHP lacks required extensions.

```bash
./vendor/bin/sail artisan <command>    # Artisan
./vendor/bin/sail composer <command>   # Composer
./vendor/bin/sail shell                # Shell into container
./vendor/bin/sail up -d                # Start containers
./vendor/bin/sail down                 # Stop containers
```

## Addon Development

The addon is symlinked via Composer path repository. Edit files in `addons/{addon-name}/` — changes reflect immediately.

To switch branches:
```bash
cd addons/{addon-name}
git checkout <branch>
cd ../..
./vendor/bin/sail composer update
```

## Test User

- **URL:** http://localhost:{PORT}/cp (check .env for APP_PORT)
- **Email:** test@sandbox.test
- **Password:** sandbox123

## Common Tasks

```bash
# Clear caches
./vendor/bin/sail artisan cache:clear
./vendor/bin/sail artisan statamic:stache:clear

# Run tests (if addon has them)
cd addons/{addon-name}
../vendor/bin/sail composer test
```

## Don't

- Run `composer` or `php artisan` directly on host (missing extensions)
- Edit files in `vendor/` (overwritten on composer update)
- Commit `vendor/`, `.env`, or Docker volumes
