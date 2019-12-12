<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\Console\Input\InputArgument;

class MakeMyModel extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:mymodel {name} {--tableName=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new model';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Model';

    /**
     * @var int
     */
    private $fillable;

    /**
     * Replace the class name for the given stub.
     *
     * @param string $stub
     * @param string $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        $stub = parent::replaceClass($stub, $name);
        $stub = str_replace('Dummy', $this->argument('name'), $stub);
        $stub = str_replace('protected $fillable = [];', $this->fillable, $stub);
        return $stub;
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return app_path() . '/Console/Commands/Stubs/make-model.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Model';
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the model.']
        ];
    }

    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function getNameInput()
    {
        return trim($this->argument('name') );
    }

    /**
     * @return bool|void|null
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle()
    {
        $tableName = $this->option('tableName');
        $fileds = Schema::getColumnListing($tableName);
        $this->fillable = sprintf('protected $fillable = [\'%s\'];', implode($fileds, "','"));

        parent::handle();
    }
}
