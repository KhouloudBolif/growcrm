<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Vehicle extends Controller
{
    //

      

    public function index()
    {
        // Renvoie la vue 'geolocation.vehicle'

        $data = [] ;

       //set page
       $page = $this->pageSettings('vehicle', $data );

        return view('pages.geolocation.vehicle.wrapper' , compact('page'));
    }
    

     /**
     * basic page setting for this section of the app
     * @param string $section page section (optional)
     * @param array $data any other data (optional)
     * @return array
     */
    
    private function pageSettings($section = '', $data = []) {

        //common settings
        $page = [
            'crumbs' => [
                __('lang.geolocation'),
                __('lang.vehicle'),
            ],
            'crumbs_special_class' => 'list-pages-crumbs',
            'page' => 'vehicle',
            'no_results_message' => __('lang.no_results_found'),
            'mainmenu_vehicle' => 'active',
            'submenu_vehicle' => 'active',
            'sidepanel_id' => 'sidepanel-filter-vehicle',
            //'dynamic_search_url' => url('vehicle/search?action=search&proposalresource_id=' . request('proposalresource_id') . '&proposalresource_type=' . request('proposalresource_type')),
            'load_more_button_route' => 'vehicle',
            'source' => 'list',
        ];

        
        //proposals list page
        if ($section == 'vehicle') {

            //adjust
            $page['page'] = 'vehicle';

            $page += [
                'meta_title' => __('lang.vehicle'),
                'heading' => __('lang.vehicle'),
            ];

            return $page;
        }

        //proposals list page
        if ($section == 'vehicle') {

            //crumbs
            $page['crumbs'] = [
                __('lang.vehicle'),
                '#' . $data->formatted_id,
            ];

            $page += [
                'meta_title' => __('lang.vehicle'),
                'heading' => __('lang.vehicle'),
            ];
            if (request('source') == 'ext') {
                $page += [
                    'list_page_actions_size' => 'col-lg-12',
                ];
            }
            return $page;
        }

        //create new resource
        if ($section == 'create') {
            $page += [
                'section' => 'create',
            ];
            return $page;
        }

        //edit new resource
        if ($section == 'edit') {
            $page += [
                'section' => 'edit',
            ];
            return $page;
        }

        //return
        return $page;
    }
}
