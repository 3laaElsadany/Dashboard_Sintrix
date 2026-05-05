<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GeneratePolicies extends Command
{
    protected $signature = 'make:policies';
    protected $description = 'Generate policies for all Filament resources';

    public function handle()
    {
        $resourcePath = app_path('Filament/Resources');

        $files = File::allFiles($resourcePath);

        foreach ($files as $file) {

            $content = file_get_contents($file->getRealPath());

            preg_match('/namespace\s+(.+);/', $content, $namespaceMatch);

            preg_match('/class\s+(\w+)/', $content, $classMatch);

            if (!$namespaceMatch || !$classMatch) {
                continue;
            }

            $fullClass = $namespaceMatch[1] . '\\' . $classMatch[1];

            if (!str_contains($fullClass, 'Resource')) {
                continue;
            }

            if (!class_exists($fullClass)) {
                $this->warn("Class not found: $fullClass");
                continue;
            }

            try {
                $modelClass = $fullClass::getModel();
            } catch (\Throwable $e) {
                continue;
            }

            $modelName = class_basename($modelClass);
            $policyName = $modelName . 'Policy';

            if (class_exists("App\\Policies\\$policyName")) {
                $this->info("⏭ Already exists: $policyName");
                continue;
            }

            $this->call('make:policy', [
                'name' => $policyName,
                '--model' => $modelName,
            ]);

            $this->info("Created: $policyName");
        }

        $this->info("Done generating policies!");
    }
}