<?php

namespace genimage;

class generator
{
    use debug;

    public $instances;
    public $instance_key;
    public $instance_config;
    public $current_instance;

    public $result;

    public function __construct()
    {
        $this::debug_clear();
    }


    public function run()
    {
        $this->get_control_options();
        $this->iterate_over_all_instances();
    }

    public function result()
    {
        return $this->result;
    }



    private function get_control_options()
    {
        $this->instances = (new options)->get_instances();
    }



    private function iterate_over_all_instances()
    {
        foreach ($this->instances as $this->instance_key => $this->instance_config) {
            if ($this->instance_config['instance_enabled'] == false){
                continue;
            }
            $this->process_single_instance();
        }
        return;
    }



    private function process_single_instance()
    {
        $this->current_instance = new runas_shortcode;
        $this->current_instance->set_config($this->instance_config);
        $this->current_instance->run();
        $this->result[] = $this->current_instance->result();
    }
}
