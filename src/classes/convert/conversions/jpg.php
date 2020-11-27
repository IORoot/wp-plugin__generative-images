<?php

namespace genimage\convert;

// use Imagick;

use genimage\interfaces\convertInterface;

class jpg implements convertInterface
{

    use \genimage\debug;


    private $target;
    private $input;
    private $output;

    private $temp_png;

    public function target($target)
    {
        $this->target = $target;
    }

    public function in($input)
    {
        $this->input = $input;
    }

    public function out()
    {
        $this->define_temp_png();
        $this->convert_to_temp_png();
        $this->convert_temp_png_to_jpg();
        $this->delete_temp_png();
        $this->target_path_to_relative();

        return $this->target;
    }



    private function define_temp_png()
    {
        $file = pathinfo($this->target);
        $this->temp_png = $file['dirname'] . '/' . $file['filename'] . '.temp.png';
    }



    /**´
     * Best way is to convert SVG to PNG using inkscape and then
     * convert the PNG to JPG using Imagick.
     * 
     * https://wiki.inkscape.org/wiki/index.php/Using_the_Command_Line
     */
    private function convert_to_temp_png()
    {
        exec('dbus-run-session inkscape --without-gui '. $this->input.' -e ' . $this->temp_png . ' 2>/dev/null', $output, $return);

        if ($return > 0) {
            $this::debug([
                'message' => 'Inkscape did not execute correctly converting to SVG -> PNG',
                'result' => $return,
                'output' => $output,
            ], static::class);

            $this->target = false;
            return;
        }

        $this::debug($output, static::class);
    }




    private function convert_temp_png_to_jpg()
    {
        exec('convert '. $this->temp_png . ' ' . $this->target . ' 2>/dev/null' , $output, $return);

        if ($return > 0) {
            $this::debug([
                'message' => 'Imagick CLI convert PNG -> JPG failed.',
                'result' => $return,
                'output' => $output,
            ], static::class);

            $this->target = false;
            return;
        }

        $this::debug($output, static::class);
    }



    
    private function delete_temp_png()
    {
        if (file_exists($this->temp_png)){
            unlink($this->temp_png);
        }
    }


    private function target_path_to_relative()
    {
        if (!$this->target){ return; }
        $this->target = str_replace(ABSPATH, '', $this->target);
    }


}