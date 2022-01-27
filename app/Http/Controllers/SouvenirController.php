<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SouvenirController extends Controller
{
    public function d_view(Request $request)
    {
        $mode = $request->query('mode');
        $s_id = $request->query('s_id');
        
        switch ($mode) {
            case 'list':
                return $this->d_list_souvenir();
                break;

            case 'add':
                return $this->d_add_souvenir($s_id);
                break;

            default:
                return 'default';
                break;
        }
    }

    public function d_list_souvenir()
    {
        return 'list';
    }

    public function d_add_souvenir($s_id)
    {
        return 'add souvenir ' . $s_id;
    }

    public function d_action(Request $request)
    {
        return 'd';
    }
}
