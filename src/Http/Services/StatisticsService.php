<?php

namespace OsKoala\Statistics\Http\Services;

use GeoIp2\Database\Reader;
use Illuminate\Http\Request;
use OsKoala\Statistics\Models\PageView;
use OsKoala\Statistics\Models\Session;
use Jenssegers\Agent\Agent;

class StatisticsService
{
    public function handle(Request $request)
    {
        $session_id    = $request->session()->getId();
        $host          = $request->getHost();
        $agent         = new Agent();
        $browser       = $agent->browser();
        $os            = $agent->platform();
        $device        = $agent->device();
        $lang          = (count($agent->languages()) > 0) ? $agent->languages()[0] : 'en';
        $screen_width  = $request->input('screen_width');
        $screen_height = $request->input('screen_height');
        $path          = $request->input('path');
        $referrer          = $request->input('referrer');

        if (!Session::query()->where("uuid", $session_id)->exists()) {
            $session = Session::query()->create([
                'uuid'     => $session_id,
                'hostname' => $host,
                'browser'  => $browser,
                'os'       => $os,
                'device'   => $device,
                'screen'   => $screen_width . "x" . $screen_height,
                'language' => $lang,
                'country'  => $this->getCountryName(),
            ]);
        } else {
            $session = Session::query()->where("uuid", $session_id)->first();
        }
        $session_id = $session->id;
        PageView::query()->create([
            'session_id' => $session_id,
            'url'        => $path,
            'referrer'   => $referrer,
        ]);
    }

    public function getCountryName()
    {
        $city_reader = new Reader(public_path("vendor/dcat-admin-extensions/mikha-dev/dcat-statistics/GeoLite2-Country.mmdb"));
        $client_ip   = $_SERVER['REMOTE_ADDR'];
        $country_name = "Unknown";

        if ( is_null($client_ip) || $client_ip == "127.0.0.1") {
            return $country_name;
        }

        try {
            $record       = $city_reader->country($client_ip);
            $country_name = $record->country->names['en'];
        } catch (\Exception $exception) {
            $country_name = "Unknown";
        }

        return $country_name;
    }
}
