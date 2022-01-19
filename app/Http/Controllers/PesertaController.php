<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesertaController extends Controller
{
    /**
     * untuk dashboard user
     * method MAPPING
     * DO NOT EDIT ANYTHING FROM THIS FUNCTION
     */
    public function d_view(Request $request)
    {
        $mode = $request->query('mode');
        $object = $request->query('object');
        $uid = $request->query('uid');

        switch ($mode) {
            case 'edit':
                if (!$uid) {
                    return $this->d_view_default();
                } else {
                    switch ($object) {
                        case 'peserta':
                            return $this->d_view_edit_peserta($uid);
                            break;

                        case 'travel':
                            return $this->d_view_edit_travel($uid);
                            break;

                        default:
                            // tampilkan list biasa
                            return $this->d_view_default();
                            break;
                    }
                }
                break;

            case 'add':
                switch ($object) {
                    case 'peserta':
                        return $this->d_view_add_peserta($uid);
                        break;

                    case 'travel':
                        return $this->d_view_add_travel($uid);
                        break;

                    default:
                        // tampilkan list biasa
                        return $this->d_view_default();
                        break;
                }
                break;

            default:
                // tampilkan list biasa
                return $this->d_view_default();
                break;
        }
    }

    protected function d_view_default()
    {
        return 'list peserta';
    }

    protected function d_view_add_peserta()
    {
        return 'add peserta';
    }

    protected function d_view_edit_peserta($uid)
    {
        return 'edit peserta - ' . $uid;
    }

    protected function d_view_add_travel()
    {
        return 'add travel';
    }

    protected function d_view_edit_travel($uid)
    {
        return 'edit travel - ' . $uid;
    }

    /**
     * untuk form-response dari dashboard user
     * method MAPPING
     * DO NOT EDIT ANYTHING FROM THIS FUNCTION
     */
    public function d_action(Request $request)
    {
        $mode = $request->query('mode');
        $object = $request->query('object');
        $uid = $request->query('uid');

        if (!$mode)
            return $this->d_action_default();

        if ($mode == 'edit')
            if (!$uid)
                return $this->d_action_default();


        switch ($mode) {
            case 'edit':
                if (!$uid) {
                    return $this->error_page();
                } else {
                    switch ($object) {
                        case 'peserta':
                            return $this->d_view_edit_peserta($uid);
                            break;

                        case 'travel':
                            return $this->d_view_edit_travel($uid);
                            break;

                        default:
                            return $this->error_page();
                            break;
                    }
                }
                break;

            case 'add':
                switch ($object) {
                    case 'peserta':
                        return $this->d_view_add_peserta($uid);
                        break;

                    case 'travel':
                        return $this->d_view_add_travel($uid);
                        break;

                    default:
                        return $this->error_page();
                        break;
                }
                break;

            default:
                return $this->error_page();
                break;
        }
    }

    protected function d_action_default()
    {
        return 'list peserta';
    }

    protected function d_action_add_peserta()
    {
        return 'add peserta';
    }

    protected function d_action_edit_peserta($uid)
    {
        return 'edit peserta - ' . $uid;
    }

    protected function d_action_add_travel()
    {
        return 'add travel';
    }

    protected function d_action_edit_travel($uid)
    {
        return 'edit travel - ' . $uid;
    }

    protected function error_page()
    {
        return 'error page';
    }
}
