<?php

namespace App\Exceptions\Transformers;

use Exception;

class DebugTransformer
{
    /**
     * Transform exception debug info.
     *
     * @param  Exception $exception
     * @return array
     */
    public function transform(Exception $exception)
    {
        $firstTrace = $exception->getTrace()[0];

        $traces = [];

        if (isset($firstTrace['line']))     $traces['line']   = $firstTrace['line'];
        if (isset($firstTrace['file']))     $traces['file']   = $firstTrace['file'];
        if (isset($firstTrace['class']))    $traces['class']  = $firstTrace['class'];
        if (isset($firstTrace['function'])) $traces['class'] .= "->".$firstTrace['function'];

        for ($i = 1; $i < count($exception->getTrace()); $i++) {
            $trace = $exception->getTrace()[$i];

            $traceInfo  = "#".($i-1);
            $traceInfo .= isset($trace['file'])     ? " ".$trace['file']      : '';
            $traceInfo .= isset($trace['line'])     ? "(".$trace['line'].")"  : ': ';
            $traceInfo .= isset($trace['class'])    ? $trace['class']         : '';
            $traceInfo .= isset($trace['function']) ? '->'.$trace['function'] : '';
            $traces['trace'][] = $traceInfo;
        }

        return $traces;
    }
}
