<?php

namespace OsKoala\Statistics;

use Dcat\Admin\Extend\ServiceProvider;

class StatisticsServiceProvider extends ServiceProvider
{
    protected $js = [
        'js/index.js',
        'js/echart/echarts.min.js',
        'js/echart/world.js',
        'js/map.js',
    ];
    protected $css = [
        'css/index.css',
    ];
    protected $middleware = [
        'middle' => [
        ]
    ];

    protected $menu = [
        [
            'title' => 'Visitor Statistics',
            'uri'   => 'auth/statistics',
            'icon'  => '',
        ],
    ];

    public function register()
    {
        $this->app->register(\Jenssegers\Agent\AgentServiceProvider::class);
    }

    public function init()
    {
        parent::init();
        //
    }

    public function settingForm()
    {
        return new Setting($this);
    }
}
