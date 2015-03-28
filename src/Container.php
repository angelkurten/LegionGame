<?php namespace AngelKurten\LegionGame;

class Container {

    protected $singleton = array();
    protected $bindings = array();

    /**
     * Bind an object to the container
     * @param $name string alias of the class inside the container
     * @param $resolver string or closure use to create a new class
     * @param bool $singleton whether you need only one instance of the object or several instances
     */
    public function bind($name, $resolver, $singleton = false)
    {
        $this->bindings[$name] = array(
            'resolver'  => $resolver,
            'singleton' => $singleton
        );
    }

    /**
     * Alias of the bind method using the singleton option
     * @param $name string alias of the class inside the container
     * @param $resolver string or closure use to create a new class
     */
    public function singleton($name, $resolver)
    {
        $this->bind($name, $resolver, true);
    }

    /**
     * Bind an instance of an object to our container
     * @param $name string alias of the class inside the container
     * @param $object object to be bound
     */
    public function instance($name, $object)
    {
        $this->singleton[$name] = $object;
    }

    /**
     * Create or get an object from the container
     * It may be resolved or retrieved from the singleton array
     * @param $name string alias of the class inside the container
     * @param array $options options to instantiate a new class
     * @return object or null
     */
    public function make($name, $options = array())
    {
        if (isset ($this->singleton[$name]))
        {
            return $this->singleton[$name];
        }

        if ( ! isset ($this->bindings[$name]))
        {
            return null;
        }

        $resolver = $this->bindings[$name]['resolver'];

        if (is_string($resolver))
        {
            $reflection = new \ReflectionClass($resolver);
            $object = $reflection->newInstanceArgs($options);
        }
        elseif ($resolver instanceof \Closure)
        {
            $object = $resolver($this, $options);
        }

        if ($this->bindings[$name]['singleton'])
        {
            $this->singleton[$name] = $object;
        }

        return $object;
    }

}