<?php namespace Machuga\Haml;

use MtHaml\Environment;
use Illuminate\View\Compilers\Compiler;
use Illuminate\View\Compilers\CompilerInterface;

class HamlCompiler extends Compiler implements CompilerInterface {

    /**
     * The Haml environment instance.
     */
    protected $environment;

    /**
     * Set the Haml environment.
     */
    public function setEnvironment(Environment $environment)
    {
        $this->environment = $environment;
    }

    /**
     * Compile the view at the given path.
     *
     * @param  string  $path
     * @return void
     */
    public function compile($path)
    {
        $contents = $this->environment->compileString($this->files->get($path), $path);

        if ( ! is_null($this->cachePath))
        {
            $this->files->put($this->getCompiledPath($path), $contents);
        }
    }

}
