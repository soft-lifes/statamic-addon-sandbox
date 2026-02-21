# Statamic Addon Sandbox Starter Kit

Minimal starter kit for creating Sail-based sandboxes to test Statamic addons.

## Installation

```bash
statamic new my-addon-sandbox soft-lifes/statamic-addon-sandbox --pro --git --no-interaction
```

## Host Prerequisites

The initializer runs a few setup steps on your host before Sail is up.

Required on host:
- Docker (running, with permission to access daemon)
- PHP CLI
- Composer
- Git

`./init-sandbox` includes a preflight guard and exits early with clear messages if anything is missing.

Also required: run inside a Git repository (use `--git` in `statamic new`, or run `git init` first).

## Usage

After installation, initialize the sandbox with your addon:

```bash
cd my-addon-sandbox
./init-sandbox <org/addon-name> [branch]
```

### Example

```bash
./init-sandbox el-schneider/statamic-magic-actions v6
```

This will:
1. Configure `.env` with auto-assigned ports and correct UID/GID
2. Install Laravel Sail
3. Clone the addon into `addons/` (independent git repo, not a submodule)
4. Add `addons/` to `.gitignore`
5. Configure composer path repository (symlinked)
6. Require the addon via composer
7. Start Sail containers
8. Fix storage permissions
9. Warm the Stache
10. Create asset stub manifest (if addon has build config)

## Access

After initialization:

- **URL:** `http://localhost:<port>/cp` (port shown after init)
- **Email:** `test@sandbox.test`
- **Password:** `sandbox123`

## Sail Commands

```bash
./vendor/bin/sail up -d          # Start containers
./vendor/bin/sail down           # Stop containers
./vendor/bin/sail artisan ...    # Run artisan commands
./vendor/bin/sail shell          # Shell as sail user
./vendor/bin/sail root-shell     # Shell as root
```

## Directory Structure

```
my-addon-sandbox/
├── addons/               # gitignored
│   └── {addon-name}/     # Independent git clone (symlinked via composer)
├── users/
│   └── test@sandbox.test.yaml
├── init-sandbox          # Setup script
└── ...
```

## Troubleshooting

### Permission Errors

```bash
./vendor/bin/sail root-shell
chown -R sail:sail /var/www/html/storage
exit
```

### Stache Errors

```bash
./vendor/bin/sail artisan statamic:stache:clear
./vendor/bin/sail artisan statamic:stache:warm
```

### Docker Permission Denied

Ensure you're in the `docker` group:
```bash
sudo usermod -aG docker $USER
# Then logout/login
```

## License

MIT
