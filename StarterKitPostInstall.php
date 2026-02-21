<?php

class StarterKitPostInstall
{
    public function handle($console)
    {
        $console->newLine();
        $console->info('╔════════════════════════════════════════════════════════════╗');
        $console->info('║     Addon Sandbox Starter Kit Installed!                   ║');
        $console->info('╚════════════════════════════════════════════════════════════╝');
        $console->newLine();
        $console->line('Next step: Initialize the sandbox with your addon:');
        $console->newLine();
        $console->line('  <comment>./init-sandbox {org}/{addon-name} [branch]</comment>');
        $console->newLine();
        $console->line('Example:');
        $console->line('  <comment>./init-sandbox el-schneider/statamic-magic-actions v6</comment>');
        $console->newLine();
        $console->line('This will:');
        $console->line('  • Install Laravel Sail');
        $console->line('  • Clone the addon into addons/');
        $console->line('  • Configure composer path repository');
        $console->line('  • Start Docker containers');
        $console->line('  • Fix permissions');
        $console->line('  • Warm the Stache');
        $console->newLine();
    }
}
