<?php

namespace genimage;

class convert_group
{

    use debug;
    
    /**
     * Array of SVG code for each image.
     * 
     * 0 => '<svg ...>'
     * 1 => '<svg ...>'
     * 2 => '<svg ...>'
     *
     * @var [type]
     */
    private $svg_group;
    private $svg_key;
    private $svg_data;

    /**
     * Contains an array of instances of current images' metadata.
     * 0 => [
     *      0 => Relative Directory
     *      1 => width
     *      2 => height
     * ]
     *
     * @var array
     */
    private $image_group;

    /**
     * save_type
     * 
     * What to save the file as.
     *
     * @var array
     */
    private $save_type;


    /**
     * converted variable
     * 
     * Array of all images that have been converted.
     *
     * @var array
     */
    public $converted;




    public function set_svg_group($svg_group)
    {
        $this->svg_group = $svg_group;
    }

    public function set_image_group($image_group)
    {
        $this->image_group = $image_group;
    }

    public function get_converted()
    {
        return $this->converted;
    }



    public function run()
    {
        foreach ($this->svg_group as $this->svg_key => $this->svg_data) {
            $this->convert_each_save_type();
        }
    }

    private function convert_each_save_type()
    {
        $save_types = (new options)->get_saves();

        foreach ($save_types as $this->save_type => $enabled)
        {
            if ($enabled == false)
            {
                continue;
            }
            $this->convert_svg_data_to_file();
        }
    }





    public function convert_svg_data_to_file()
    {
        $convert = new convert();
        $convert->set_svg_data($this->svg_data);
        $convert->set_filepath($this->image_group[$this->svg_key][0]);
        $convert->set_savetype($this->save_type);
        $convert->run();
        $convert->cleanup();
        $this->converted[$this->svg_key][] = $convert->get_result();
    }



}