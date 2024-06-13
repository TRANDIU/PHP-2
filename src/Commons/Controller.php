<?php 

namespace Php2\Exam\Commons;

use eftec\bladeone\BladeOne;

class Controller
{
    public function renderView($view, $data = []) {
        $templatePath = __DIR__ . '/../Views';
        $compiledPath = __DIR__ . '/../Views/Compiles';

        $blade = new BladeOne($templatePath, $compiledPath);

        echo $blade->run($view, $data);
    }
}