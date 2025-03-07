<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeoSubscription extends Controller
{
    
    public function index()
    {

        $data = [] ;

       //set page
       $page = $this->pageSettings('subscription', $data );

        return view('pages.geolocation.subscription.wrapper' , compact('page'));
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
                __('lang.subscription'),
            ],
            'crumbs_special_class' => 'list-pages-crumbs',
            'page' => 'subscription',
            'no_results_message' => __('lang.no_results_found'),
            'mainmenu_subscription' => 'active',
            'submenu_subscription' => 'active',
            'sidepanel_id' => 'sidepanel-filter-subscription',
            //'dynamic_search_url' => url('proposals/search?action=search&proposalresource_id=' . request('proposalresource_id') . '&proposalresource_type=' . request('proposalresource_type')),
            'load_more_button_route' => 'subscription',
            'source' => 'list',
        ];

        
        //proposals list page
        if ($section == 'subscription') {

            //adjust
            $page['page'] = 'subscription';

            $page += [
                'meta_title' => __('lang.subscription'),
                'heading' => __('lang.subscription'),
            ];

            return $page;
        }

        //proposals list page
        if ($section == 'subscription') {

            //crumbs
            $page['crumbs'] = [
                __('lang.subscription'),
                '#' . $data->formatted_id,
            ];

            $page += [
                'meta_title' => __('lang.subscription'),
                'heading' => __('lang.subscription'),
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
