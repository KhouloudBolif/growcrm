<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class intervention extends Controller
{
    //

    
    public function index()
    {
        

        $data = [] ;

       //set page
       $page = $this->pageSettings('intervention', $data );

        return view('pages.geolocation.intervention.wrapper' , compact('page'));
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
                __('lang.intervention'),
            ],
            'crumbs_special_class' => 'list-pages-crumbs',
            'page' => 'intervention',
            'no_results_message' => __('lang.no_results_found'),
            'mainmenu_intervention' => 'active',
            'submenu_intervention' => 'active',
            'sidepanel_id' => 'sidepanel-filter-intervention',
            //'dynamic_search_url' => url('intervention/search?action=search&proposalresource_id=' . request('proposalresource_id') . '&proposalresource_type=' . request('proposalresource_type')),
            'load_more_button_route' => 'intervention',
            'source' => 'list',
        ];

        
        //proposals list page
        if ($section == 'intervention') {

            //adjust
            $page['page'] = 'intervention';

            $page += [
                'meta_title' => __('lang.intervention'),
                'heading' => __('lang.intervention'),
            ];

            return $page;
        }

        //proposals list page
        if ($section == 'intervention') {

            //crumbs
            $page['crumbs'] = [
                __('lang.intervention'),
                '#' . $data->formatted_id,
            ];

            $page += [
                'meta_title' => __('lang.intervention'),
                'heading' => __('lang.intervention'),
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
