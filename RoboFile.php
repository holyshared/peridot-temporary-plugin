<?php

use \Robo\Tasks;
use \coverallskit\robo\loadTasks as CoverallsKitTasks;
use \peridot\robo\loadTasks as PeridotTasks;


/**
 * Class RoboFile
 */
class RoboFile extends Tasks
{

    use PeridotTasks;
    use CoverallsKitTasks;

    public function specAll()
    {
        $result = $this->taskPeridot()
            ->directoryPath('spec')
            ->reporter('dot')
            ->bail()
            ->run();

        return $result;
    }

    public function coverallsUpload()
    {
        $result = $this->taskCoverallsKit()
            ->configureBy('.coveralls.toml')
            ->run();

        return $result;
    }

    public function exampleBasic()
    {
        $result = $this->taskPeridot()
            ->directoryPath('example/spec')
            ->configuration('example/peridot.php')
            ->reporter('dot')
            ->bail()
            ->run();

        return $result;
    }

}
