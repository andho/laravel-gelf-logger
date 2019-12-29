<?php

namespace Hedii\LaravelGelfLogger\Processors;


class ExtraContextProcessor
{

    private $extra;

    public function __construct($config)
    {
        $this->extra = $config['extra'];
    }

    public function __invoke($record)
    {
        if ($this->extra) {
            $record['context'] = array_merge($record['context'], $this->extra);
        }

        return $record;
    }

}
