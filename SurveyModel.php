<?php

namespace Survey;

/**
 * Class SurveyModel
 * This class is a way to save survey results
 *
 * @package Survey
 *
 */
class SurveyModel
{
    /**
     * File descriptor
     *
     * @var bool|resource
     */
    protected $file;

    /**
     * SurveyModel constructor.
     * Opens/creates file and saves its descriptor
     */
    function __construct()
    {
        $this->file = fopen('data.log', 'a+');
    }

    /**
     * Writes data to open file
     *
     * @param string $data
     */
    function write(string $data)
    {
        fwrite($this->file, $data . "\n");
    }

    /**
     * Closes file to save space for cases of large and persisting PHP process
     */
    function __destruct()
    {
        fclose($this->file);
    }
}