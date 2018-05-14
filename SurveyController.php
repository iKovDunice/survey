<?php

namespace Survey;

require_once 'SurveyModel.php';

/**
 * Class SurveyController
 * @package Survey
 */
class SurveyController
{
    /**
     * Method renders the only page. reachable by GET request.
     */
    public function renderPage()
    {
        include_once 'survey.html';
    }

    /**
     *
     * Method decides what to do with data if one was provided
     * and sets status code depending on it
     * It is a main method to save survey results
     * Method saves data via model - an instance of SurveyModel
     *
     * @return null
     */
    public function saveData()
    {
        try {
            $data = $this->getData();
        } catch (\Exception $e) {
            http_response_code(400);
            return null;
        }
        try {
            $model = new SurveyModel();
            $model->write(json_encode($data));
        } catch (\Exception $e) {
            http_response_code(500);
        }
    }

    /**
     * Method returns data from POST request of throws an exception if
     * one or many fields are empty
     *
     * @return array
     * @throws \Exception
     */
    protected function getData()
    {
        $names = [
            'name',
            'goal1',
            'goal2',
            'goal3',
        ];
        $data = [];
        foreach ($names as $name) {
            if (!isset($_POST[$name]) || empty($_POST[$name])) {
                throw new \Exception('Missing arguments');
            }
            $data[$name] = $_POST[$name];
        }
        return $data;
    }
}